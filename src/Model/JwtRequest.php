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
    const TYPE_CLIENT_CREDENTIAL = 'client_credentials';
    /**
     * Tipo de concessão
     *
     * @var string|null
     */
    private ?string $grantType = null;
    /**
     * Tipo de resposta
     *
     * @var string|null
     */
    private ?string $responseType = null;
    /**
     * ID do cliente registrado no servidor de autorização
     *
     * @var string|null
     */
    private ?string $clientId = null;
    /**
     * Segredo do cliente registrado no servidor de autorização
     *
     * @var string|null
     */
    private ?string $clientSecret = null;
    /**
     * @var string|null
     */
    private ?string $username = null;
    /**
     * Senha do proprietário do recurso
     *
     * @var string|null
     */
    private ?string $password = null;
    /**
     * @var string|null
     */
    private ?string $refreshToken = null;
    /**
     * A URI de redirecionamento usada na solicitação de autorização
     *
     * @var string|null
     */
    private ?string $redirectUri = null;
    /**
     * Código de autorização recebido na etapa anterior do fluxo
     *
     * @var string|null
     */
    private ?string $code = null;
    /**
     * @var string|null
     */
    private ?string $nonce = null;
    /**
     * Um valor opaco fornecido pelo cliente que deve ser incluído na resposta
     *
     * @var string|null
     */
    private ?string $state = null;
    /**
     * Define como a resposta do provedor de autorização OAuth 2.0 deve ser entregue ao aplicativo cliente
     *
     * @var string|null
     */
    private ?string $responseMode = null;
    /**
     * Hash do código de verificação usado pelo PKCE (PKCE).
     *
     * @var string|null
     */
    private ?string $codeChallenge = null;
    /**
     * Método usado para gerar o hash do código de verificação co PKCE geralmente 'S256' ou 'plain'.
     *
     * @var string|null
     */
    private ?string $codeChallengeMethod = null;
    /**
     * Código de verificação usando pelo PKCE
     *
     * @var string|null
     */
    private ?string $codeVerifier = null;

    /**
     * @return string|null
     */
    public function getGrantType(): ?string
    {
        return $this->grantType;
    }

    /**
     * @param string|null $grantType
     * @return JwtRequest
     */
    public function setGrantType(?string $grantType): JwtRequest
    {
        $this->grantType = $grantType;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getResponseType(): ?string
    {
        return $this->responseType;
    }

    /**
     * @param string|null $responseType
     * @return JwtRequest
     */
    public function setResponseType(?string $responseType): JwtRequest
    {
        $this->responseType = $responseType;
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
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @param string|null $username
     * @return JwtRequest
     */
    public function setUsername(?string $username): JwtRequest
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param string|null $password
     * @return JwtRequest
     */
    public function setPassword(?string $password): JwtRequest
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getRefreshToken(): ?string
    {
        return $this->refreshToken;
    }

    /**
     * @param string|null $refreshToken
     * @return JwtRequest
     */
    public function setRefreshToken(?string $refreshToken): JwtRequest
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
     * @return JwtRequest
     */
    public function setRedirectUri(?string $redirectUri): JwtRequest
    {
        $this->redirectUri = $redirectUri;
        return $this;
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
     * @return JwtRequest
     */
    public function setCode(?string $code): JwtRequest
    {
        $this->code = $code;
        return $this;
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
     * @return JwtRequest
     */
    public function setNonce(?string $nonce): JwtRequest
    {
        $this->nonce = $nonce;
        return $this;
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
     * @return JwtRequest
     */
    public function setState(?string $state): JwtRequest
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getResponseMode(): ?string
    {
        return $this->responseMode;
    }

    /**
     * @param string|null $responseMode
     * @return JwtRequest
     */
    public function setResponseMode(?string $responseMode): JwtRequest
    {
        $this->responseMode = $responseMode;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCodeChallenge(): ?string
    {
        return $this->codeChallenge;
    }

    /**
     * @param string|null $codeChallenge
     * @return JwtRequest
     */
    public function setCodeChallenge(?string $codeChallenge): JwtRequest
    {
        $this->codeChallenge = $codeChallenge;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCodeChallengeMethod(): ?string
    {
        return $this->codeChallengeMethod;
    }

    /**
     * @param string|null $codeChallengeMethod
     * @return JwtRequest
     */
    public function setCodeChallengeMethod(?string $codeChallengeMethod): JwtRequest
    {
        $this->codeChallengeMethod = $codeChallengeMethod;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCodeVerifier(): ?string
    {
        return $this->codeVerifier;
    }

    /**
     * @param string|null $codeVerifier
     * @return JwtRequest
     */
    public function setCodeVerifier(?string $codeVerifier): JwtRequest
    {
        $this->codeVerifier = $codeVerifier;
        return $this;
    }

    /**
     * Valida se o objeto possui dados validos segundo padrão oauth2 e openid connect
     *
     * @return bool
     */
    public function isValid(): bool
    {
        $validGrantTypes = [
            JwtRequest::TYPE_AUTHORIZATION_CODE,
            JwtRequest::TYPE_IMPLICIT,
            JwtRequest::TYPE_PASSWORD,
            JwtRequest::TYPE_CLIENT_CREDENTIAL,
            JwtRequest::TYPE_REFRESH_TOKEN,
        ];

        $validResponseTypes = [
            'code',
            'token',
            'id_token',
            'code id_token',
            'code token',
            'code id_token token',
            'id_token token',
        ];

        $validResponseModes = [
            'query',
            'fragment',
            'form_post',
            'jwt',
            'cookie',
        ];
        if (!empty($this->grantType) && !in_array($this->grantType, $validGrantTypes, true)) {
            return false;
        }

        if (!empty($this->responseType) && !in_array($this->responseType, $validResponseTypes, true)) {
            return false;
        }
        if (!empty($this->responseMode) && !in_array($this->responseMode, $validResponseModes, true)) {
            return false;
        }

        switch ($this->grantType) {
            case JwtRequest::TYPE_AUTHORIZATION_CODE:
                return
                    (!empty($this->code) && !empty($this->clientId) && !empty($this->clientSecret)) ||
                    (!empty($this->code) && !empty($this->codeVerifier));
            case JwtRequest::TYPE_PASSWORD:
                return !empty($this->clientId) && !empty($this->clientSecret) && !empty($this->username) && !empty($this->password);
            case JwtRequest::TYPE_CLIENT_CREDENTIAL:
                return !empty($this->clientId) && !empty($this->clientSecret);
            case JwtRequest::TYPE_REFRESH_TOKEN:
                return !empty($this->clientId) && !empty($this->clientSecret) && !empty($this->refreshToken);
            default:
                if (!empty($this->grantType)) return false;
                $t = empty($this->responseType) ? [] : explode(' ', $this->responseType);
                if (in_array('token', $t) && !empty($this->clientId)) return true;
                if (in_array('code', $t) && !empty($this->clientId)) return true;
                return false;
        }
    }
}
