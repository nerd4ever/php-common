<?php
/**
 * Created by Sileno de Oliveira Brito on 07/08/2024.
 * Copyright (c) 2024 Nerd4ever All rights reserved.
 */

namespace Nerd4ever\Common\Model;

class City extends Local
{
    private int $cityId;
    private State $state;

    public function getCityId(): int
    {
        return $this->cityId;
    }

    public function setCityId(int $cityId): City
    {
        $this->cityId = $cityId;
        return $this;
    }


    public function getState(): State
    {
        return $this->state;
    }

    public function setState(State $state): City
    {
        $this->state = $state;
        return $this;
    }

    public function getType(): string
    {
        return 'city';
    }
}
