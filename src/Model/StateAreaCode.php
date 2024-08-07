<?php
/**
 * Created by Sileno de Oliveira Brito on 07/08/2024.
 * Copyright (c) 2024 Nerd4ever All rights reserved.
 */

namespace Nerd4ever\Common\Model;

class StateAreaCode
{
    use TChronological;

    protected ?string $id = null;
    private State $state;
    private int $areaCode;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): StateAreaCode
    {
        $this->id = $id;
        return $this;
    }

    public function getState(): State
    {
        return $this->state;
    }

    public function setState(State $state): StateAreaCode
    {
        $this->state = $state;
        return $this;
    }

    public function getAreaCode(): int
    {
        return $this->areaCode;
    }

    public function setAreaCode(int $areaCode): StateAreaCode
    {
        $this->areaCode = $areaCode;
        return $this;
    }

}