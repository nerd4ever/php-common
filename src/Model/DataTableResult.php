<?php

namespace Nerd4ever\Common\Model;

class DataTableResult
{
    private int $currentPage = 0;
    private int $pageSize = 0;
    private int $totalPages = 0;
    private int $totalRecords = 0;
    private array $data = [];

    public function getCurrentPage(): int
    {
        return $this->currentPage;
    }

    public function setCurrentPage(int $currentPage): DataTableResult
    {
        $this->currentPage = $currentPage;
        return $this;
    }

    public function getPageSize(): int
    {
        return $this->pageSize;
    }

    public function setPageSize(int $pageSize): DataTableResult
    {
        $this->pageSize = $pageSize;
        return $this;
    }

    public function getTotalPages(): int
    {
        return $this->totalPages;
    }

    public function setTotalPages(int $totalPages): DataTableResult
    {
        $this->totalPages = $totalPages;
        return $this;
    }

    public function getTotalRecords(): int
    {
        return $this->totalRecords;
    }

    public function setTotalRecords(int $totalRecords): DataTableResult
    {
        $this->totalRecords = $totalRecords;
        return $this;
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function setData(array $data): DataTableResult
    {
        $this->data = $data;
        return $this;
    }

}
