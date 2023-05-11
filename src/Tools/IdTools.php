<?php

namespace Nerd4ever\Common\Tools;

use Ramsey\Uuid\Uuid;

class IdTools
{
    public static function gen(): string
    {
        // Gerar um UUIDv4
        $uuid = Uuid::uuid4();

        // Obter o UUID formatado
        return $uuid->toString();


    }

    public static function gen32(): string
    {
        return substr(IdTools::gen(), 0, 32);
    }

}