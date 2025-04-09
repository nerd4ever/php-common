<?php
/**
 * Created by Sileno de Oliveira Brito on 08/04/2025.
 * Copyright (c) 2025 Nerd4ever All rights reserved.
 */

namespace Nerd4ever\Common\Model;

class BasicUser implements BasicUserInterface
{
    protected ?string $id = null;
    protected string $email;
    protected string $name;
    protected ?string $roleId = null;
    protected ?string $providerId = null;
    protected ?string $internalId = null;
    protected ?string $customerId = null;
    protected array $types = [];
    protected bool $emailVerified;
    protected bool $enabled;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): BasicUser
    {
        $this->id = $id;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): BasicUser
    {
        $this->email = $email;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): BasicUser
    {
        $this->name = $name;
        return $this;
    }

    public function getRoleId(): ?string
    {
        return $this->roleId;
    }

    public function setRoleId(?string $roleId): BasicUser
    {
        $this->roleId = $roleId;
        return $this;
    }

    public function getProviderId(): ?string
    {
        return $this->providerId;
    }

    public function setProviderId(?string $providerId): BasicUser
    {
        $this->providerId = $providerId;
        return $this;
    }

    public function getInternalId(): ?string
    {
        return $this->internalId;
    }

    public function setInternalId(?string $internalId): BasicUser
    {
        $this->internalId = $internalId;
        return $this;
    }

    public function getCustomerId(): ?string
    {
        return $this->customerId;
    }

    public function setCustomerId(?string $customerId): BasicUser
    {
        $this->customerId = $customerId;
        return $this;
    }

    public function getTypes(): array
    {
        return $this->types;
    }

    public function setTypes(array $types): BasicUser
    {
        $this->types = $types;
        return $this;
    }

    public function isEmailVerified(): bool
    {
        return $this->emailVerified;
    }

    public function setEmailVerified(bool $emailVerified): BasicUser
    {
        $this->emailVerified = $emailVerified;
        return $this;
    }

    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    public function setEnabled(bool $enabled): BasicUser
    {
        $this->enabled = $enabled;
        return $this;
    }
}