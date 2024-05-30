<?php
/**
 * Created by Sileno de Oliveira Brito on 30/05/2024.
 * Copyright (c) 2024 Nerd4ever All rights reserved.
 */

namespace Nerd4ever\Common\Model;

interface IdpAdapterInterface
{
    public function getValidPayload(string $tokenString): array;

    public function findUser(string $email, ?TenantInterface $tenant): ?FederationUser;

    public function updateUser(FederationUser $user, TenantInterface $tenant): void;

    public function createUser(FederationUser $user, TenantInterface $tenant): void;

    public function removeUser(string $username): void;

    public function revokeUser(string $username, TenantInterface $tenant): void;

    public function addUserInGroup(FederationUser $sa, $groupName): void;

    public function removeUserFromGroup(FederationUser $sa, $groupName): void;

    public function getAccessToken(): ?string;

    public function getAccessTokenWith(string $username, string $password): ?string;

    public function trustInUser(FederationUser $user, TenantInterface $tenant): void;
}