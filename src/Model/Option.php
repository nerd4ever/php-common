<?php
/**
 * Created by Sileno de Oliveira Brito on 12/12/2024.
 * Copyright (c) 2024 Nerd4ever All rights reserved.
 */

namespace Nerd4ever\Common\Model;

class Option
{
    private ?string $description = null;

    public function __construct(
        private readonly string $id,
        private readonly string $value
    )
    {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

}