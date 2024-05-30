<?php
/**
 * Created by Sileno de Oliveira Brito on 30/05/2024.
 * Copyright (c) 2024 Nerd4ever All rights reserved.
 */

namespace Nerd4ever\Common\Model;

trait FederationTrait
{
    use FederationIdTrait;

    protected ?array $federationRoles = null;
    protected ?array $federationAttributes = null;


    public function getFederationRoles(): array
    {
        if ($this->federationRoles === null) $this->federationRoles = [];
        return $this->federationRoles;
    }

    public function setFederationRoles(?array $federationRoles): static
    {
        $this->federationRoles = $federationRoles;
        return $this;
    }

    public function getFederationAttributes(): array
    {
        if ($this->federationAttributes === null) $this->federationAttributes = [];
        return $this->federationAttributes;
    }

    public function setFederationAttributes(?array $federationAttributes): static
    {
        $this->federationAttributes = $federationAttributes;
        return $this;
    }
}