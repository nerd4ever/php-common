<?php
/**
 * Created by Sileno de Oliveira Brito on 07/08/2024.
 * Copyright (c) 2024 Nerd4ever All rights reserved.
 */

namespace Nerd4ever\Common\Model;

class Country extends Local
{
    private ?int $countryId = null;
    private string $iso2;
    private string $iso3;
    private string $officialName;
    private int $callingCode;

    public function getCountryId(): ?int
    {
        return $this->countryId;
    }

    public function setCountryId(?int $countryId): Country
    {
        $this->countryId = $countryId;
        return $this;
    }

    public function getIso2(): string
    {
        return $this->iso2;
    }

    public function setIso2(string $iso2): Country
    {
        $this->iso2 = $iso2;
        return $this;
    }

    public function getIso3(): string
    {
        return $this->iso3;
    }

    public function setIso3(string $iso3): Country
    {
        $this->iso3 = $iso3;
        return $this;
    }

    public function getOfficialName(): string
    {
        return $this->officialName;
    }

    public function setOfficialName(string $officialName): Country
    {
        $this->officialName = $officialName;
        return $this;
    }

    public function getCallingCode(): int
    {
        return $this->callingCode;
    }

    public function setCallingCode(int $callingCode): Country
    {
        $this->callingCode = $callingCode;
        return $this;
    }

    public function getType(): string
    {
        return 'country';
    }

}