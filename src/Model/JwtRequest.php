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

    private string $grantType;
    private ?string $clientId;
    private ?string $clientSecret;
    private string $username;
    private string $password;
    private string $refreshToken;

    /**
     * @return string
     */
    public function getGrantType(): string
    {
        return $this->grantType;
    }

    /**
     * @param string $grantType
     * @return JwtRequest
     */
    public function setGrantType(string $grantType): JwtRequest
    {
        $this->grantType = $grantType;
        return $this;
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

}