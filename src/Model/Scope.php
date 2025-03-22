<?php
/**
 * Created by Sileno de Oliveira Brito on 21/03/2025.
 * Copyright (c) 2025 Nerd4ever All rights reserved.
 */

namespace Nerd4ever\Common\Model;

use Doctrine\Common\Collections\Collection;

class Scope implements IScope
{
    public function __construct(
        private readonly string     $name,
        private readonly string     $label,
        private readonly ?string    $description,
        private readonly Collection $scopes
    )
    {
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getName(): string
    {
        return $this->name;
    }


    public function getScopes(): Collection
    {
        return $this->scopes;
    }
}