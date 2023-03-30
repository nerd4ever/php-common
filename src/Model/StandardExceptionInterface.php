<?php

namespace Nerd4ever\Common\Model;

interface StandardExceptionInterface
{
    /**
     * Especifica o tipo de erro
     *
     * @return string
     */
    public function getError(): string;

    /**
     * Fornecer uma descrição mais detalhada do erro
     *
     * @return string
     */
    public function getErrorDescription(): string;

    /**
     * Retorna o erro formado em array
     *
     * @return array
     */
    public function toArray(): array;
}