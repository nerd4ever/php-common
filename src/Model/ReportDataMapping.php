<?php
/**
 * Created by Sileno de Oliveira Brito on 11/12/2024.
 * Copyright (c) 2024 Nerd4ever All rights reserved.
 */

namespace Nerd4ever\Common\Model;

class ReportDataMapping implements ReportDataMappingInterface
{
    private array $data = [];
    private ?object $total = null;

    public function __construct(
        private readonly string $module,
        private readonly string $category,
        private readonly string $identifier,
    )
    {
    }

    public function getModule(): string
    {
        return $this->module;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function setData(array $data): static
    {
        $this->data = $data;
        return $this;
    }

    public function getTotal(): ?object
    {
        return $this->total;
    }

    public function setTotal(?object $total): static
    {
        $this->total = $total;
        return $this;
    }

}