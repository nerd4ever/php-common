<?php
/**
 * Created by Sileno de Oliveira Brito on 02/04/2024.
 * Copyright (c) 2024 Nerd4ever All rights reserved.
 */

namespace Nerd4ever\Common\Model;

class NameFinder
{
    private ?string $id = null;
    private string $name;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): NameFinder
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): NameFinder
    {
        $this->name = $name;
        return $this;
    }
}
