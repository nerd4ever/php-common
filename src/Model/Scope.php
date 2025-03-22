<?php
/**
 * Created by Sileno de Oliveira Brito on 21/03/2025.
 * Copyright (c) 2025 Nerd4ever All rights reserved.
 */

namespace Nerd4ever\Common\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Scope implements IScope
{
    private string $label;
    private ?string $description = null;
    private ?string $name = null;
    private Collection $scopes;

    /**
     * @param string $label
     * @param string|null $description
     * @param string|null $name
     * @param Collection $scopes
     */
    public function __construct(string $label, ?string $description, ?string $name, Collection $scopes)
    {
        $this->label = $label;
        $this->description = $description;
        $this->name = $name;
        $this->scopes = $scopes;
    }


    public function getLabel(): string
    {
        return $this->label;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getScopes(): Collection
    {
        if(empty($this->scopes)) {
            $this->scopes = new ArrayCollection();
        }
        return $this->scopes;
    }
}