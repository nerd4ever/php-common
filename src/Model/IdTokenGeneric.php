<?php

namespace Nerd4ever\Common\Model;

use DateTime;

/**
 * My IdTokenGeneric
 *
 * @package Nerd4ever\Common\Model
 * @author Sileno de Oliveira Brito
 */
class IdTokenGeneric implements IdTokenInterface
{
    protected ?string $accessToken = null;
    protected ?string $issuer = null;
    protected ?string $subject = null;
    protected string $audience = '';
    protected DateTime $expirationTime;
    protected DateTime $issuedAt;
    protected string $name = '';
    protected string $email = '';
    protected bool $emailVerified = false;
    protected ?array $address = null;
    protected ?string $picture = null;
    protected ?string $phoneNumber = null;
    protected ?bool $phoneNumberVerified = null;
    protected ?DateTime $birthdate = null;
    protected ?string $gender = null;
    protected ?array $claimRoles = [];
    protected ?string $accessTokenHash = null;
    protected ?DateTime $authorizedAt = null;
    protected ?string $nonce = null;
    protected ?DateTime $notBefore = null;
    protected ?string $authenticationContextClassReference = null;
    protected ?string $authenticationMethodsReferences = null;
    protected ?string $authorizedPartyTheParty = null;
    protected ?string $profile = null;
    protected ?DateTime $userUpdatedAt = null;

    public function getAccessToken(): ?string
    {
        return $this->accessToken;
    }

    public function getIssuer(): ?string
    {
        return $this->issuer;
    }

    public function getSubject(): string
    {
        return $this->subject;
    }

    public function getAudience(): string
    {
        return $this->audience;
    }

    public function getExpirationTime(): DateTime
    {
        return $this->expirationTime;
    }

    public function getIssuedAt(): DateTime
    {
        return $this->issuedAt;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getEmailVerified(): ?bool
    {
        return $this->emailVerified;
    }

    public function getAddress(): ?array
    {
        return $this->address;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function getPhoneNumberVerified(): ?bool
    {
        return $this->phoneNumberVerified;
    }

    public function getBirthdate(): ?DateTime
    {
        return $this->birthdate;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function getClaimRoles(): array
    {
        return $this->claimRoles;
    }

    public function getAccessTokenHash(): ?string
    {
        return $this->accessTokenHash;
    }

    public function getAuthorizedAt(): ?DateTime
    {
        return $this->authorizedAt;
    }

    public function getNonce(): ?string
    {
        return $this->nonce;
    }

    public function getNotBefore(): ?DateTime
    {
        return $this->notBefore;
    }

    public function getAuthenticationContextClassReference(): ?string
    {
        return $this->authenticationContextClassReference;
    }

    public function getAuthenticationMethodsReferences(): ?string
    {
        return $this->authenticationMethodsReferences;
    }

    public function getAuthorizedPartyTheParty(): ?string
    {
        return $this->authorizedPartyTheParty;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function getProfile(): ?string
    {
        return $this->profile;
    }

    public function getUserUpdatedAt(): ?DateTime
    {
        return $this->userUpdatedAt;
    }
}
