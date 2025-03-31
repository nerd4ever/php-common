<?php
/**
 * Created by Sileno de Oliveira Brito on 31/03/2025.
 * Copyright (c) 2025 Nerd4ever All rights reserved.
 */

namespace Nerd4ever\Common\Model;

interface VendorInterface
{
    public function getVersion(): string;

    public function getName(): string;

    public function getIdentifier(): string;
}