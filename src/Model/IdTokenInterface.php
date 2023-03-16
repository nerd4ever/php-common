<?php

namespace Nerd4ever\Common\Model;

use DateTime;

interface IdTokenInterface
{
    /**
     * Esse campo contém o access token
     *
     * @return string|null
     */
    public function getAccessToken(): ?string;

    /**
     * Esse campo contém um hash usado para validar o token at_hash
     *
     * @return string|null
     */
    public function getAccessTokenHash(): ?string;

    /**
     * Esse campo identifica o emissor do "id_token", que é o provedor de identidade que emitiu o token
     *
     * @return string|null
     */
    public function getIssuer(): ?string;

    /**
     * Esse campo contém o identificador exclusivo do usuário autenticado
     *
     * @return string
     */
    public function getSubject(): string;

    /**
     * Esse campo indica o público-alvo do "id_token", que é o cliente (aplicativo ou serviço) que solicitou a
     * autenticação
     *
     * @return string
     */
    public function getAudience(): string;

    /**
     * Esse campo indica o horário em que o "id_token" expira e não pode mais ser usado
     *
     * @return DateTime
     */
    public function getExpirationTime(): DateTime;

    /**
     * Esse campo indica o horário em que o "id_token" foi emitido
     *
     * @return DateTime
     */
    public function getIssuedAt(): DateTime;

    /**
     * Este campo indica a  data/hora em que o usuário foi autenticado
     *
     * @return DateTime|null
     */
    public function getAuthorizedAt(): ?DateTime;

    /**
     * Este campo contém um valor gerado pelo cliente durante a solicitação de autenticação
     *
     * @return string|null
     */
    public function getNonce(): ?string;


    /**
     * Este campo contém o nome completo do usuário.
     *
     * @return string|null
     */
    public function getName(): ?string;

    /**
     * Este campo contém o endereço de e-mail do usuário
     *
     * @return string|null
     */
    public function getEmail(): ?string;

    /**
     * Este campo indica se o endereço de e-mail do usuário foi verificado
     *
     * @return bool|null
     */
    public function getEmailVerified(): ?bool;

    /**
     * Este campo contém o endereço do usuário
     *
     * @return array|null
     */
    public function getAddress(): ?array;

    /**
     * Este campo contém o número de telefone do usuário
     *
     * @return string|null
     */
    public function getPhoneNumber(): ?string;

    /**
     * Este campo indica se o número de telefone do usuário foi verificado.
     *
     * @return bool|null
     */
    public function getPhoneNumberVerified(): ?bool;

    /**
     * Este campo contém a data de nascimento do usuário
     *
     * @return DateTime|null
     */
    public function getBirthdate(): ?DateTime;

    /**
     * Este campo contém o gênero do usuário
     *
     * @return string|null
     */
    public function getGender(): ?string;

    /**
     * Este campo contém as permissões de acesso do usuário
     *
     * @return array
     */
    public function getClaimRoles(): array;

    /**
     * Este campo contém o momento em que o token se tornará válido
     *
     * @return DateTime|null
     */
    public function getNotBefore(): ?DateTime;

    /**
     * Este campo contém identificação da classe de referência do contexto de autenticação
     *
     * @return string|null
     */
    public function getAuthenticationContextClassReference(): ?string;

    /**
     * Este campo contém o método de autenticação usado para autenticar o usuário
     *
     * @return string|null
     */
    public function getAuthenticationMethodsReferences(): ?string;

    /**
     * Este campo contém a identificação do cliente que autorizado
     *
     * @return string|null
     */
    public function getAuthorizedPartyTheParty(): ?string;

    /**
     * Retorna a foto associada ao usuário
     *
     * @return string|null
     */
    public function getPicture(): ?string;

    /**
     * Retorna uma URL que representa o perfil do usuário.
     *
     * @return string|null
     */
    public function getProfile(): ?string;

    /**
     * Retorna o momento em que as informações do usuário foram atualizadas pela última
     *
     * @return DateTime|null
     */
    public function getUserUpdatedAt(): ?DateTime;

}
