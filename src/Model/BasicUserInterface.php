<?php
/**
 * Created by Sileno de Oliveira Brito on 09/04/2025.
 * Copyright (c) 2025 Nerd4ever All rights reserved.
 */

namespace Nerd4ever\Common\Model;

interface BasicUserInterface
{
    public function getId(): ?string;

    public function getEmail(): string;

    public function getName(): string;

    public function getRoleId(): ?string;

    public function getProviderId(): ?string;

    public function getInternalId(): ?string;

    public function getCustomerId(): ?string;

    public function getTypes(): array;

    public function isEmailVerified(): bool;

    public function isEnabled(): bool;
}