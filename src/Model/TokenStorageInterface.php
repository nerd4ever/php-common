<?php

namespace Nerd4ever\Common\Model;

interface TokenStorageInterface
{
    /**
     * Retorna um identificador único do Token
     *
     * @return string
     */
    public function getId(): string;

    /**
     * Retorna o tipo do Token
     *
     * @return string
     */
    public function getTokenType(): string;
}