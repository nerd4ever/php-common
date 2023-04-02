<?php

namespace Nerd4ever\Common\Model;

interface TokenStorageInterface
{
    /**
     * Retorna um identificador único do Token
     *
     */
    public function getTokenTId(): string;

    /**
     * Retorna o tipo do Token
     *
     * @return string
     */
    public function getTokenType(): string;
}