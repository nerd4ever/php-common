<?php
/**
 * Created by Sileno de Oliveira Brito on 23/04/2024.
 * Copyright (c) 2024 Nerd4ever All rights reserved.
 */

namespace Nerd4ever\Common\Model;

use DateTime;

class Filter
{
    const SORT_DIRECTION_ASC = 'asc';
    const SORT_DIRECTION_DESC = 'desc';

    public function __construct(

        private readonly ?string   $search,
        private readonly ?int      $pageIndex,
        private readonly ?int      $pageSize,
        private readonly ?string   $sortActive,
        private readonly ?string   $sortDirection,
        private readonly ?DateTime $dateStart,
        private readonly ?DateTime $dateEnd,
    )
    {
    }

    public function getSearch(): ?string
    {
        return $this->search;
    }

    public function getPageIndex(): ?int
    {
        return $this->pageIndex;
    }

    public function getPageSize(): ?int
    {
        return $this->pageSize;
    }

    public function getSortActive(): ?string
    {
        return $this->sortActive;
    }

    public function getSortDirection(): ?string
    {
        return $this->sortDirection;
    }

    public function getDateStart(): ?DateTime
    {
        return $this->dateStart;
    }

    public function getDateEnd(): ?DateTime
    {
        return $this->dateEnd;
    }

}
