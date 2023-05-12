<?php

namespace Nerd4ever\Common\Tools;

use Ramsey\Uuid\Uuid;

class IdTools
{
    public static function gen(): string
    {
        // Gerar um UUIDv6
        $uuid = Uuid::uuid6();

        // Obter o UUID formatado
        return $uuid->toString();
    }
}