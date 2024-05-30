<?php
/**
 * Created by Sileno de Oliveira Brito on 30/05/2024.
 * Copyright (c) 2024 Nerd4ever All rights reserved.
 */

namespace Nerd4ever\Common\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class FederationUser
{
    use FederationTrait;

    private string $email;
    private string $name;
    private bool $enabled;
    private bool $emailVerified;
    private string $username;

    private Collection $groups;
    private Collection $roles;
    private Collection $tenants;

    public function __construct()
    {
        $this->roles = new ArrayCollection();
        $this->tenants = new ArrayCollection();
        $this->groups = new ArrayCollection();
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): FederationUser
    {
        $this->email = $email;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): FederationUser
    {
        $this->name = $name;
        return $this;
    }

    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    public function setEnabled(bool $enabled): FederationUser
    {
        $this->enabled = $enabled;
        return $this;
    }

    public function isEmailVerified(): bool
    {
        return $this->emailVerified;
    }

    public function setEmailVerified(bool $emailVerified): FederationUser
    {
        $this->emailVerified = $emailVerified;
        return $this;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): FederationUser
    {
        $this->username = $username;
        return $this;
    }

    public function getRoles(): Collection
    {
        return $this->roles;
    }

    public function setRoles(Collection $roles): FederationUser
    {
        $this->roles = $roles;
        return $this;
    }

    public function getTenants(): Collection
    {
        return $this->tenants;
    }

    public function setTenants(Collection $tenants): FederationUser
    {
        $this->tenants = $tenants;
        return $this;
    }

    public function getGroups(): Collection
    {
        return $this->groups;
    }

    public function setGroups(Collection $groups): FederationUser
    {
        $this->groups = $groups;
        return $this;
    }
}