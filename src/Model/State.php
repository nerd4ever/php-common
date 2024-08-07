<?php
/**
 * Created by Sileno de Oliveira Brito on 07/08/2024.
 * Copyright (c) 2024 Nerd4ever All rights reserved.
 */

namespace Nerd4ever\Common\Model;


class State extends Local
{
    private ?int $stateId = null;
    private string $iso2;
    private Country $country;

    public function getStateId(): ?int
    {
        return $this->stateId;
    }

    public function setStateId(?int $stateId): State
    {
        $this->stateId = $stateId;
        return $this;
    }

    public function getIso2(): string
    {
        return $this->iso2;
    }

    public function setIso2(string $iso2): State
    {
        $this->iso2 = $iso2;
        return $this;
    }

    public function getCountry(): Country
    {
        return $this->country;
    }

    public function setCountry(Country $country): State
    {
        $this->country = $country;
        return $this;
    }

    public function getType(): string
    {
        return 'state';
    }
}