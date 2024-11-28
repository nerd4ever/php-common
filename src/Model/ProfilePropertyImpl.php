<?php
/**
 * Created by Sileno de Oliveira Brito on 28/11/2024.
 * Copyright (c) 2024 Nerd4ever All rights reserved.
 */

namespace Nerd4ever\Common\Model;

class ProfilePropertyImpl implements ProfilePropertyInterface
{
    public function __construct(
        private readonly string  $profileName,
        private readonly string  $profileProperty,
        private readonly ?string $profileValue = null,
    )
    {

    }

    public function getProfileName(): string
    {
        return $this->profileName;
    }

    public function getProfileProperty(): string
    {
        return $this->profileProperty;
    }

    public function getProfileValue(): ?string
    {
        return $this->profileValue;
    }

}