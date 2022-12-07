<?php

namespace Nerd4ever\Common\Model;

class DataTableResult
{

    private int $echo = 1;

    private int $page = 0;

    private int $total = 0;

    private int $length = 0;

    private array $rows = [];

    /**
     * @return int
     */
    public function getEcho(): int
    {
        return $this->echo;
    }

    /**
     * @param int $echo
     * @return DataTableResult
     */
    public function setEcho(int $echo): DataTableResult
    {
        $this->echo = $echo;
        return $this;
    }

    /**
     * @return int
     */
    public function getPage(): int
    {
        return $this->page;
    }

    /**
     * @param int $page
     * @return DataTableResult
     */
    public function setPage(int $page): DataTableResult
    {
        $this->page = $page;
        return $this;
    }

    /**
     * @return int
     */
    public function getTotal(): int
    {
        return $this->total;
    }

    /**
     * @param int $total
     * @return DataTableResult
     */
    public function setTotal(int $total): DataTableResult
    {
        $this->total = $total;
        return $this;
    }

    /**
     * @return int
     */
    public function getLength(): int
    {
        return $this->length;
    }

    /**
     * @param int $length
     * @return DataTableResult
     */
    public function setLength(int $length): DataTableResult
    {
        $this->length = $length;
        return $this;
    }

    /**
     * @return array
     */
    public function getRows(): array
    {
        return $this->rows;
    }

    /**
     * @param array $rows
     * @return DataTableResult
     */
    public function setRows(array $rows): DataTableResult
    {
        $this->rows = $rows;
        return $this;
    }

}