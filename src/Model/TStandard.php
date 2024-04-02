<?php
/**
 * Created by Sileno de Oliveira Brito on 02/04/2024.
 * Copyright (c) 2024 Nerd4ever All rights reserved.
 */

namespace Nerd4ever\Common\Model;

trait TStandard
{
    protected ?bool $standard = null;

    public function getStandard(): ?bool
    {
        return $this->standard;
    }

    public function setStandard(?bool $standard): object
    {
        $this->standard = $standard;
        return $this;
    }
}