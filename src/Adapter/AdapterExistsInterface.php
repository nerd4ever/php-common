<?php
/**
 * Created by Sileno de Oliveira Brito on 09/05/2025.
 * Copyright (c) 2025 Nerd4ever All rights reserved.
 */

namespace Nerd4ever\Common\Adapter;

interface AdapterExistsInterface
{
    public function exists(object $object): bool;
}