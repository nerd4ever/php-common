<?php
/**
 * Created by Sileno de Oliveira Brito on 21/03/2025.
 * Copyright (c) 2025 Nerd4ever All rights reserved.
 */

namespace Nerd4ever\Common\Model;

use Doctrine\Common\Collections\Collection;

interface IScope
{
    public function getLabel(): string;

    public function getDescription(): ?string;

    public function getName(): string;

    public function getScopes(): Collection;
}