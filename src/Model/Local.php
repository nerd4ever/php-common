<?php
/**
 * Created by Sileno de Oliveira Brito on 07/08/2024.
 * Copyright (c) 2024 Nerd4ever All rights reserved.
 */

namespace Nerd4ever\Common\Model;

abstract class Local
{
    use TChronological;

    protected ?string $id = null;
    protected string $name;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): Local
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Local
    {
        $this->name = $name;
        return $this;
    }

    public abstract function getType(): string;
}