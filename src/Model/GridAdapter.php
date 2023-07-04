<?php
/**
 * @author    Sileno de Oliveira Brito
 * @email     sobrito@nerd4ever.com.br
 * @copyright Copyright (c) 2023
 */

namespace Nerd4ever\Common\Model;
/**
 * My GridAdapter
 *
 * @package Nerd4ever\Kaya\PabxBundle\Adapter
 * @author Sileno de Oliveira Brito
 */
class GridAdapter
{
    public function __construct(private readonly array $data)
    {
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    public function getTotal(): int
    {
        return count($this->data);
    }
}