<?php
/**
 * Created by Sileno de Oliveira Brito on 25/10/2024.
 * Copyright (c) 2024 Nerd4ever All rights reserved.
 */

namespace Nerd4ever\Common\Model;

class PaginatorColumn
{

    public function __construct(
        private readonly string                   $alias,
        private readonly string                   $tablePrefix,
        private readonly ?string                  $column = null,
        private readonly ?PaginatorColumnTypeEnum $type = PaginatorColumnTypeEnum::STRING // Default type is string, can be overridden
    )
    {
    }

    public function getAlias(): string
    {
        return $this->alias;
    }

    public function getTablePrefix(): string
    {
        return $this->tablePrefix;
    }

    public function getColumn(): string
    {
        return empty($this->column) ? $this->alias : $this->column;
    }

    public function getField(): string
    {
        return $this->tablePrefix . '.' . $this->getColumn();
    }

    public function getType(): ?PaginatorColumnTypeEnum
    {
        return $this->type;
    }


}