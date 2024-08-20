<?php
/**
 * Created by Sileno de Oliveira Brito on 07/08/2024.
 * Copyright (c) 2024 Nerd4ever All rights reserved.
 */

namespace Nerd4ever\Common\Model;

class StateAreaCode extends Local
{

    private State $state;
    private int $areaCode;


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

    public function getType(): string
    {
        return 'area-code';
    }
}