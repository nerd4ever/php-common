<?php
/**
 * Created by Sileno de Oliveira Brito on 23/04/2024.
 * Copyright (c) 2024 Nerd4ever All rights reserved.
 */

namespace Nerd4ever\Common\Adapter;

use Nerd4ever\Common\Model\DataTableResult;
use Nerd4ever\Common\Model\Filter;

interface AdapterDatatableInterface
{
    public function datatable(?Filter $filter = null): DataTableResult;
}