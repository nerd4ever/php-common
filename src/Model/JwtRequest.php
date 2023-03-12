<?php
/**
 * Created by IntelliJ IDEA.
 * User: sobrito
 * Date: 01/11/2018
 * Time: 11:42
 */

namespace Nerd4ever\Common\Model;


class JwtRequest
{
    const TYPE_REFRESH_TOKEN = 'refresh_token';
    const TYPE_PASSWORD = 'password';
    const TYPE_AUTHORIZATION_CODE = 'authorization_code';
    const TYPE_IMPLICIT = 'implicit';
    const TYPE_CLIENT_CREDENTIAL = 'client_credential';

    private ?string $grantType = null;
    private ?string $clientId;
    private ?string $clientSecret;
    private string $username;
    private string $password;
    private string $refreshToken;
    private ?string $redirectUri = null;
    private ?string $code = null;
    private ?string $nonce = null;
    private ?string $state = null;

    /**
     * @return string|null
     */
    public function getGrantType(): ?string
    {
        return $this->grantType;
    }

    /**
     * @param string|null $grantType
     */
    public function setGrantType(?string $grantType): void
    {
        $this->grantType = $grantType;
    }

    /**
     * @return string|null
     */
    public function getClientId(): ?string
    {
        return $this->clientId;
    }

    /**
     * @param string|null $clientId
     * @return JwtRequest
     */
    public function setClientId(?string $clientId): JwtRequest
    {
        $this->clientId = $clientId;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getClientSecret(): ?string
    {
        return $this->clientSecret;
    }

    /**
     * @param string|null $clientSecret
     * @return JwtRequest
     */
    public function setClientSecret(?string $clientSecret): JwtRequest
    {
        $this->clientSecret = $clientSecret;
        return $this;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return JwtRequest
     */
    public function setUsername(string $username): JwtRequest
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return JwtRequest
     */
    public function setPassword(string $password): JwtRequest
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return string
     */
    public function getRefreshToken(): string
    {
        return $this->refreshToken;
    }

    /**
     * @param string $refreshToken
     * @return JwtRequest
     */
    public function setRefreshToken(string $refreshToken): JwtRequest
    {
        $this->refreshToken = $refreshToken;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getRedirectUri(): ?string
    {
        return $this->redirectUri;
    }

    /**
     * @param string|null $redirectUri
     */
    public function setRedirectUri(?string $redirectUri): void
    {
        $this->redirectUri = $redirectUri;
    }

    /**
     * @return string|null
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * @param string|null $code
     */
    public function setCode(?string $code): void
    {
        $this->code = $code;
    }

    /**
     * @return string|null
     */
    public function getNonce(): ?string
    {
        return $this->nonce;
    }

    /**
     * @param string|null $nonce
     */
    public function setNonce(?string $nonce): void
    {
        $this->nonce = $nonce;
    }

    /**
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param string|null $state
     */
    public function setState(?string $state): void
    {
        $this->state = $state;
    }

}