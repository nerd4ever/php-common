<?php
/**
 * Created by Sileno de Oliveira Brito on 30/05/2024.
 * Copyright (c) 2024 Nerd4ever All rights reserved.
 */

namespace Nerd4ever\Common\Model;

interface TenantInterface
{
    public function getIdentifier(): ?string;
}