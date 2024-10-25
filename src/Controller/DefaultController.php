<?php
/**
 * Created by Sileno de Oliveira Brito on 08/07/2024.
 * Copyright (c) 2024 Nerd4ever All rights reserved.
 */

namespace Nerd4ever\Common\Controller;

use JMS\Serializer\SerializerInterface;
use Nerd4ever\Common\Adapter\AdapterCreateInterface;
use Nerd4ever\Common\Adapter\AdapterDatatableInterface;
use Nerd4ever\Common\Adapter\AdapterDeleteInterface;
use Nerd4ever\Common\Adapter\AdapterEnableInterface;
use Nerd4ever\Common\Adapter\AdapterListInterface;
use Nerd4ever\Common\Adapter\AdapterNameFinderInterface;
use Nerd4ever\Common\Adapter\AdapterReadInterface;
use Nerd4ever\Common\Adapter\AdapterUpdateInterface;
use Nerd4ever\Common\Model\FilterTrait;
use Nerd4ever\Common\Model\GridAdapter;
use Nerd4ever\Common\Model\NameFinder;
use Nerd4ever\Common\Model\ResponseTrait;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController as Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Exception;

abstract class DefaultController extends Controller
{
    use ResponseTrait;
    use FilterTrait;

    public function __construct(
        private readonly SerializerInterface $serializer,
    )
    {
    }

    public function getSerializer(): SerializerInterface
    {
        return $this->serializer;
    }

    const ACTION_CREATE = 'create';
    const ACTION_EDIT = 'edit';
    const ACTION_SHOW = 'show';
    const ACTION_LIST = 'list';
    const ACTION_DELETE = 'delete';

    abstract function getAdapter(): object;

    abstract function getClass(): string;

    protected function deserializationGroups(): array
    {
        return ['Detail'];
    }

    protected function isInstance($entity): bool
    {
        $class = $this->getClass();
        return $entity instanceof $class;
    }

    protected function getClassname(): string
    {
        if (empty($this->className)) {
            $tmp = explode('\\', $this->getClass());
            $this->className = array_pop($tmp);
        }
        return $this->className;
    }

    public function listAction(Request $request): Response
    {
        try {
            $adapter = $this->getAdapter();
            if (!$adapter instanceof AdapterListInterface) {
                throw new Exception('Adapter must implement AdapterListInterface', Response::HTTP_NOT_ACCEPTABLE);
            }
            $entities = $adapter->list();
            return $this->viewGrid($request, new GridAdapter($entities));
        } catch (Exception $ex) {
            return $this->viewException($request, $ex);
        }
    }

    public function createAction(Request $request): Response
    {
        try {
            $adapter = $this->getAdapter();
            if (!$adapter instanceof AdapterCreateInterface) {
                throw new Exception('Adapter must implement AdapterCreateInterface', Response::HTTP_NOT_ACCEPTABLE);
            }
            $entity = $this->getObject($request, $this->getClass(), $this->deserializationGroups());
            if (!$this->isInstance($entity)) {
                throw new Exception(sprintf('Expected an instance of %s', $this->getClassname()), Response::HTTP_NOT_ACCEPTABLE);
            }
            $newEntity = $adapter->create($entity);
            if (!$this->isInstance($newEntity)) {
                throw new Exception(sprintf('Failure on create a new %s', $this->getClassname()), Response::HTTP_UNPROCESSABLE_ENTITY);
            }
            return $this->viewShow($request, $newEntity);
        } catch (Exception $ex) {
            return $this->viewException($request, $ex);
        }
    }

    public function deleteAction(Request $request, $id): Response
    {
        try {
            $adapter = $this->getAdapter();
            if (!$adapter instanceof AdapterDeleteInterface) {
                throw new Exception('Adapter must implement AdapterDeleteInterface', Response::HTTP_NOT_ACCEPTABLE);
            }
            $adapter->delete($id);
            return $this->viewDelete();
        } catch (Exception $ex) {
            return $this->viewException($request, $ex);
        }
    }

    public function readAction(Request $request, $id): Response
    {
        try {
            $adapter = $this->getAdapter();
            if (!$adapter instanceof AdapterReadInterface) {
                throw new Exception('Adapter must implement AdapterReadInterface', Response::HTTP_NOT_ACCEPTABLE);
            }
            $entity = $adapter->read($id);
            if (!$this->isInstance($entity)) {
                throw new Exception(sprintf("%s not found", $this->getClassname()), Response::HTTP_NOT_FOUND);
            }
            return $this->viewShow($request, $entity);
        } catch (Exception $ex) {
            return $this->viewException($request, $ex);
        }
    }

    public function updateAction(Request $request, $id): Response
    {
        try {
            $adapter = $this->getAdapter();
            if (!$adapter instanceof AdapterUpdateInterface) {
                throw new Exception('Adapter must implement AdapterUpdateInterface', Response::HTTP_NOT_ACCEPTABLE);
            }
            $entity = $this->getObject($request, $this->getClass(), $this->deserializationGroups());
            if (!$this->isInstance($entity)) {
                throw new Exception(sprintf('Expected an instance of %s', $this->getClassname()), Response::HTTP_NOT_ACCEPTABLE);
            }
            $newEntity = $adapter->update($entity, $id);
            return $this->viewShow($request, $newEntity);
        } catch (Exception $ex) {
            return $this->viewException($request, $ex);
        }
    }

    public function enableAction(Request $request, $id): Response
    {
        try {
            $adapter = $this->getAdapter();
            if (!$adapter instanceof AdapterEnableInterface) {
                throw new Exception('Adapter must implement AdapterEnableInterface', Response::HTTP_NOT_ACCEPTABLE);
            }
            $adapter->enable($id, $request->get('enable'));
            return $this->viewAccept();
        } catch (Exception $ex) {
            return $this->viewException($request, $ex);
        }
    }

    public function nameValidationAction(Request $request): Response
    {
        try {
            $adapter = $this->getAdapter();
            if (!$adapter instanceof AdapterNameFinderInterface) {
                throw new Exception('Adapter must implement AdapterNameFinderInterface', Response::HTTP_NOT_ACCEPTABLE);
            }
            $entity = $this->getObject($request, NameFinder::class);
            if (!$entity instanceof NameFinder) {
                throw new Exception('Failed to get the object name finder.', Response::HTTP_UNPROCESSABLE_ENTITY);
            }
            return new JsonResponse(['exists' => $adapter->nameFinder($entity)]);
        } catch (Exception $ex) {
            return $this->viewException($request, $ex);
        }
    }


    public function datatableAction(Request $request): Response
    {
        try {
            $adapter = $this->getAdapter();
            if (!$adapter instanceof AdapterDatatableInterface) {
                throw new Exception('Adapter must implement AdapterDatatableInterface', Response::HTTP_NOT_ACCEPTABLE);
            }

            $filter = $this->getFilter($request);
            $entity = $adapter->datatable($filter);
            return $this->viewShow($request, $entity);
        } catch (Exception $ex) {
            return $this->viewException($request, $ex);
        }
    }
}