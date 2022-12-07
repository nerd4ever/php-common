<?php

namespace Nerd4ever\Common\Model;


class View
{

    private ?int $statusCode;

    private $data;

    private array $headers;

    private array $groups;

    private string $format;

    /**
     * View constructor.
     * @param int $statusCode
     * @param mixed $data
     * @param $headers
     */
    public function __construct($data, int $statusCode, $headers)
    {
        $this->statusCode = $statusCode;
        $this->data = $data;
        $this->headers = $headers;
        $this->format = 'json';
    }


    /**
     * @return int
     */
    public function getStatusCode(): ?int
    {
        return $this->statusCode;
    }

    /**
     * @param int $statusCode
     * @return View
     */
    public function setStatusCode(int $statusCode): View
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     * @return View
     */
    public function setData($data): View
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @param mixed $headers
     * @return View
     */
    public function setHeaders($headers): View
    {
        $this->headers = $headers;
        return $this;
    }

    /**
     * @return array
     */
    public function getGroups(): array
    {
        return $this->groups;
    }

    /**
     * @param array $groups
     * @return View
     */
    public function setGroups(array $groups): View
    {
        $this->groups = $groups;
        return $this;
    }

    /**
     * @return string
     */
    public function getFormat(): string
    {
        return $this->format;
    }

    /**
     * @param string $format
     * @return View
     */
    public function setFormat(string $format): View
    {
        $this->format = $format;
        return $this;
    }

    public function getContentType(): string
    {
        switch ($this->format) {
            case 'json':
                return 'application/json';
            case 'xml':
                return 'application/xml';
            default:
                return 'text/plain';
        }
    }
}