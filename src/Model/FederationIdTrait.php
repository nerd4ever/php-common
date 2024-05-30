<?php
/**
 * Created by Sileno de Oliveira Brito on 30/05/2024.
 * Copyright (c) 2024 Nerd4ever All rights reserved.
 */

namespace Nerd4ever\Common\Model;

trait FederationIdTrait
{
    protected ?string $federationId = null;

    public function getFederationId(): ?string
    {
        return $this->federationId;
    }

    public function setFederationId(?string $federationId): static
    {
        $this->federationId = $federationId;
        return $this;
    }
}