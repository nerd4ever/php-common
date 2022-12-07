<?php
/**
 * Created by IntelliJ IDEA.
 * User: sobrito
 * Date: 01/11/2018
 * Time: 11:42
 */

namespace Nerd4ever\Common\Model;


class JwtResponse
{
    const TOKEN_TYPE_BEARER = 'bearer';

    private string $accessToken;

    private string $expiresIn;

    private string $tokenType;

    private string $scope;

    private string $refreshToken;

    /**
     * @return string
     */
    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    /**
     * @param string $accessToken
     * @return JwtResponse
     */
    public function setAccessToken(string $accessToken): JwtResponse
    {
        $this->accessToken = $accessToken;
        return $this;
    }

    /**
     * @return string
     */
    public function getExpiresIn(): string
    {
        return $this->expiresIn;
    }

    /**
     * @param string $expiresIn
     * @return JwtResponse
     */
    public function setExpiresIn(string $expiresIn): JwtResponse
    {
        $this->expiresIn = $expiresIn;
        return $this;
    }

    /**
     * @return string
     */
    public function getTokenType(): string
    {
        return $this->tokenType;
    }

    /**
     * @param string $tokenType
     * @return JwtResponse
     */
    public function setTokenType(string $tokenType): JwtResponse
    {
        $this->tokenType = $tokenType;
        return $this;
    }

    /**
     * @return string
     */
    public function getScope(): string
    {
        return $this->scope;
    }

    /**
     * @param string $scope
     * @return JwtResponse
     */
    public function setScope(string $scope): JwtResponse
    {
        $this->scope = $scope;
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
     * @return JwtResponse
     */
    public function setRefreshToken(string $refreshToken): JwtResponse
    {
        $this->refreshToken = $refreshToken;
        return $this;
    }

}
