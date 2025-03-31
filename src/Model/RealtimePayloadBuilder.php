<?php
/**
 * Created by Sileno de Oliveira Brito on 31/03/2025.
 * Copyright (c) 2025 Nerd4ever All rights reserved.
 */

namespace Nerd4ever\Common\Model;

class RealtimePayloadBuilder
{
    public static function create(string $module, array $payload, bool $delete = false): array
    {
        return [
            'module' => $module,
            'action' => $delete ? 'delete' : 'update',
            'data' => json_encode($payload),
        ];
    }
}