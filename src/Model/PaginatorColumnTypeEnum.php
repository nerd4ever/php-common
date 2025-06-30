<?php
/**
 * Created by Sileno de Oliveira Brito on 30/06/2025.
 * Copyright (c) 2025 Nerd4ever All rights reserved.
 */

namespace Nerd4ever\Common\Model;

enum PaginatorColumnTypeEnum: string
{
    case STRING = 'string';
    case NUMBER = 'number';
    case DATE = 'date';
    case BOOLEAN = 'boolean';
}
