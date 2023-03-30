<?php

namespace Nerd4ever\Common\Model;

use Exception;

/**
 * My StandardException
 *
 * @package Nerd4ever\Common\Model
 * @author Sileno de Oliveira Brito
 */
class StandardException extends Exception implements StandardExceptionInterface
{
    private string $error;

    public function __construct(string $error, string $errorDescription = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($errorDescription, $code < 100 || $code > 600 ? 500 : $code, $previous);
        $this->error = $error;
    }

    /**
     * Fornecer uma descrição mais detalhada do erro
     *
     * @return string
     */
    public function getErrorDescription(): string
    {
        return $this->getMessage();
    }

    /**
     * Especifica o tipo de erro
     *
     * @return string
     */
    public function getError(): string
    {
        return $this->error;
    }

    public function toArray(): array
    {
        return [
            'error' => $this->getError(),
            'error_description' => $this->getErrorDescription(),
            'code' => $this->getCode(),
        ];
    }
}