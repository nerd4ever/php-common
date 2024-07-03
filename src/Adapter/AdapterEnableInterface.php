<?php
/**
 * Created by Sileno de Oliveira Brito on 26/03/2024.
 * Copyright (c) 2024 Nerd4ever All rights reserved.
 */

namespace Nerd4ever\Common\Adapter;

interface AdapterEnableInterface
{
    public function enable(string $id, bool $enable): void;
}