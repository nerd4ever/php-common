<?php
/**
 * Created by Sileno de Oliveira Brito on 11/12/2024.
 * Copyright (c) 2024 Nerd4ever All rights reserved.
 */

namespace Nerd4ever\Common\Model;

interface ReportDataMappingInterface
{
    public function getModule(): string;

    public function getCategory(): string;

    public function getIdentifier(): string;

    public function getData(): array;

    public function getTotal(): ?object;
}