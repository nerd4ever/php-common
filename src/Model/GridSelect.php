<?php

namespace Nerd4ever\Common\Model;
/**
 * My GridSelect
 *
 * @package Nerd4ever\Common\Model
 * @author Sileno de Oliveira Brito
 */
class GridSelect
{
    private array $available;
    private array $selected;

    /**
     * @return array
     */
    public function getAvailable(): array
    {
        return $this->available;
    }

    /**
     * @param array $available
     * @return GridSelect
     */
    public function setAvailable(array $available): GridSelect
    {
        $this->available = $available;
        return $this;
    }

    /**
     * @return array
     */
    public function getSelected(): array
    {
        return $this->selected;
    }

    /**
     * @param array $selected
     * @return GridSelect
     */
    public function setSelected(array $selected): GridSelect
    {
        $this->selected = $selected;
        return $this;
    }
}