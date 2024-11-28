<?php
/**
 * Created by Sileno de Oliveira Brito on 28/11/2024.
 * Copyright (c) 2024 Nerd4ever All rights reserved.
 */

namespace Nerd4ever\Common\Model;

interface ProfilePropertyInterface
{
    public function getProfileName(): string;

    public function getProfileProperty(): string;

    public function getProfileValue(): ?string;
}