<?php

namespace Nerd4ever\Common\Model;

use DateTime;

/**
 * Interface SessionMetadataInterface
 *
 * Esta interface define os métodos que devem ser implementados para obter as informações de metadados de sessão.
 *
 * @package Nerd4ever\IDP\Model\Grid
 */
interface SessionMetadataInterface
{
    //  Plataforma Android.
    const PlatformAndroid = 'android';
    // Plataforma iPhone
    const PlatformIPhone = 'iphone';
    // Plataforma iPad
    const PlatformIPad = 'ipad';
    // Plataforma Windows
    const PlatformWindows = 'windows';
    // Plataforma Mac
    const PlatformMac = 'mac';
    // Plataforma Linux
    const PlatformLinux = 'linux';
    //  Plataforma desconhecida
    const PlatformUnknown = 'unknown';

    // Dispositivo móvel
    const DeviceMobile = 'mobile';
    // Dispositivo tablet
    const DeviceTablet = 'tablet';
    // Dispositivo desktop
    const DeviceDesktop = 'desktop';

    // Tipo de autorização por cookie
    const AuthorizationTypeCookie = 'cookie';
    // Tipo de autorização por token
    const AuthorizationTypeToken = 'token';

    //  Usado para indicar que a sessão expirará quando o navegador for fechado.
    const ExpireTypeSession = 'session';
    // Usado para indicar que o cookie expirará em uma data definida.
    const ExpireTypeCookie = 'cookie';
    // Usado para indicar que o access token não tem data de expiração e será revalidado periodicamente pelo refresh token.
    const ExpireTypeAccessToken = 'token';

    /**
     * Obtém o user agent usado para a sessão.
     *
     * @return string O user agent usado para a sessão.
     */
    public function getUserAgent(): string;

    /**
     * Obtém o endereço IP usado para a sessão.
     *
     * @return string O endereço IP usado para a sessão.
     */
    public function getIpAddress(): string;

    /**
     * Obtém o ID da aplicação autorizada.
     *
     * @return string O ID da aplicação autorizada.
     */
    public function getClientId(): string;

    /**
     * Obtém o ID da requisição de autorização.
     *
     * @return string O ID da requisição de autorização.
     */
    public function getRequestId(): string;

    /**
     * Obtém o ID do usuário que autorizou.
     *
     * @return string O ID da aplicação autorizada.
     */
    public function getUserId(): string;


    /**
     * Obtém o fluxo do OAuth2 usado para a sessão.
     *
     * @return string O fluxo do OAuth2 usado para a sessão.
     */
    public function getOAuth2Flow(): string;

    /**
     * Obtém o tipo de autorização usado para a sessão (por exemplo, cookie, token).
     *
     * @return string O tipo de autorização usado para a sessão.
     */
    public function getAuthorizationType(): string;

    /**
     * Obtém o tipo de expiração da sessão (por exemplo, sessão do navegador, cookie ou access token).
     *
     * @return string O tipo de autorização usado para a sessão.
     */
    public function getExpireType(): string;

    /**
     * Obtém a data e hora em que a sessão expirará
     *
     * @return DateTime|null
     */
    public function getExpireAt(): ?DateTime;

    /**
     * Obtém a data e hora em que a autorização foi concedida.
     *
     * @return DateTime A data e hora em que a autorização foi concedida.
     */
    public function getAuthorizedAt(): DateTime;

    /**
     * Obtém a data e hora em que os metadados da sessão foram atualizados pela última vez.
     *
     * @return DateTime A data e hora em que os metadados da sessão foram atualizados pela última vez.
     */
    public function getUpdatedAt(): DateTime;
}