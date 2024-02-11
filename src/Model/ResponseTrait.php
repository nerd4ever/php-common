<?php
/**
 * @author    Sileno de Oliveira Brito
 * @email     sobrito@nerd4ever.com.br
 * @copyright Copyright (c) 2023
 */

namespace Nerd4ever\Common\Model;

use DateTimeImmutable;
use JMS\Serializer\DeserializationContext;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Exception;
use RuntimeException;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

trait ResponseTrait
{
    /**
     * @return SerializerInterface
     */
    public function getSerializer(): SerializerInterface
    {
        throw new RuntimeException('You must be override this method');
    }


    private function handleView(View $view): Response
    {
        $ctx = SerializationContext::create()->setGroups($view->getGroups());
        $mData = $this->getSerializer()->serialize($view->getData(), $view->getFormat(), $ctx);
        $code = $view->getStatusCode() < 100 || $view->getStatusCode() >= 600 ? 500 : $view->getStatusCode();
        $response = new Response($mData, $code, $view->getHeaders());
        $response->headers->set('Content-Type', $view->getContentType());
        return $response;
    }

    private function view($data = null, $statusCode = null, array $headers = []): View
    {
        $view = new View($data, $statusCode, $headers);
        $view->setGroups(array('Default'));
        return $view;
    }

    public function viewDataTable($request, array $entities): Response
    {
        try {
            $out = new DataTableResult();
            $out->setLength(count($entities));
            $out->setTotal($out->getLength());
            $out->setPage(1);
            $out->setRows($entities);

            $view = $this->view($out, Response::HTTP_OK);
            $view->setGroups(array(
                'DataTable',
                'Default'
            ));
            return $this->handleView($view);
        } catch (Exception $ex) {
            return $this->viewException($request, $ex);
        }
    }

    public function getObjectFromArray(array $data, string $class, ?array $groups = null, ?string $type = null): ?object
    {
        $context = DeserializationContext::create();
        $context->setGroups($groups ?? ['Show', 'Default', 'ReadOnly']);
        $jData = json_encode(
            array_merge(
                $data,
                empty($mBodyData) ? array() : $mBodyData,
                !empty($type) ? array('t_type' => $type) : array()
            )
        );
        return $this->getSerializer()->deserialize($jData, $class, 'json', $context);
    }

    public function getObject(Request $request, string $class, ?array $groups = null, ?string $type = null): ?object
    {
        $mBodyData = array();
        $body = $request->getContent();
        if (!empty($body)) {
            $mBodyData = json_decode($body, true);
        }
        $data = array_merge(
            $request->request->all(),
            empty($mBodyData) ? array() : $mBodyData,
            !empty($type) ? array('t_type' => $type) : array()
        );
        return $this->getObjectFromArray($data, $class, $groups, $type);
    }

    protected function viewRaw(Request $request, string $data): Response
    {
        $response = new Response($data);
        $response->headers->set('Content-Type', 'text/plain');
        return $response;
    }

    protected function viewJson(Request $request, array $data): Response
    {
        try {
            $view = $this->view($data, Response::HTTP_OK);
            $view->setGroups(['Show', 'Default']);
            return $this->handleView($view);
        } catch (Exception $ex) {
            return $this->viewException($request, $ex);
        }
    }

    protected function viewDownload(Request $request, $filename): Response
    {
        $response = new BinaryFileResponse($filename);
        $disposition = $response->headers->makeDisposition(
            ResponseHeaderBag::DISPOSITION_ATTACHMENT,
            basename($filename)
        );
        $response->headers->set('Content-Disposition', $disposition);
        return $response;
    }

    public function viewGrid(Request $request, GridAdapter $gridAdapter): Response
    {
        try {
            $view = $this->view($gridAdapter, Response::HTTP_OK);
            $view->setGroups(['Default', 'Grid']);
            return $this->handleView($view);
        } catch (Exception $ex) {
            return $this->viewException($request, $ex);
        }
    }

    public function viewShow(Request $request, $entity, array $groups = []): Response
    {
        try {
            if ($entity === null) {
                throw  new StandardException(
                    'try_show_null_object',
                    "Object not exists",
                    Response::HTTP_NOT_FOUND
                );
            }
            if (!is_object($entity)) {
                throw  new Exception("Not is a object", Response::HTTP_NOT_ACCEPTABLE);
            }
            $view = $this->view($entity, Response::HTTP_OK);
            $view->setGroups(array_merge(['Show', 'Default', 'WriteOnly'], $groups));
            return $this->handleView($view);
        } catch (Exception $ex) {
            return $this->viewException($request, $ex);
        }
    }

    public function viewException(Request $request, Exception $exception): Response
    {
        $mCode = $exception->getCode();
        if (str_contains($exception->getMessage(), 'Foreign key violation')) $mCode = Response::HTTP_FAILED_DEPENDENCY;

        $this->dumpException($exception);
        $out = array(
            'code' => $mCode,
            'errorDescription' => $exception->getMessage(),
            'address' => $request->getClientIp()
        );
        $view = $this->view($out, $mCode > 0 ? $mCode : Response::HTTP_INTERNAL_SERVER_ERROR);
        return $this->handleView($view);
    }

    /**
     * @param Exception $exception
     */
    private function dumpException(Exception $exception): void
    {
        error_log($exception->getMessage());
    }

    public function getCopyright(): string
    {
        return sprintf('2020 - %s © Nerd4ever', (new DateTimeImmutable())->format('Y'));
    }

    /**
     * @return Response
     */
    public function viewAccept(): Response
    {
        return (new Response())->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function viewReject(): Response
    {
        return (new Response())->setStatusCode(Response::HTTP_CONFLICT);
    }

    public function viewDelete(): Response
    {
        return (new Response())->setStatusCode(Response::HTTP_NO_CONTENT);
    }

}