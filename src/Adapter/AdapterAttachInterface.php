<?php
/**
 * Created by Sileno de Oliveira Brito on 12/04/2024.
 * Copyright (c) 2024 Nerd4ever All rights reserved.
 */

namespace Nerd4ever\Common\Adapter;

interface AdapterAttachInterface
{
    public function attach(string $id, string $archiveId): object;

    public function detach(string $id): void;
}