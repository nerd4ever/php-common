<?php

namespace Nerd4ever\Common\Model;

use GuzzleHttp\Client;
use DateTime;

/**
 * My Session
 *
 * @package Nerd4ever\Common\Model
 * @author Sileno de Oliveira Brito
 */
class Session
{
    /**
     * Dispositivo: Essa coluna é útil para rastrear o tipo de dispositivo que está sendo usado para acessar a
     * aplicação. Isso pode ser usado para identificar se uma determinada plataforma (por exemplo, Android, iOS,
     * Windows) é mais popular entre os usuários.
     *
     * @var string
     */
    protected string $device;
    protected string $platform;

    /**
     * Aplicação: Essa coluna é importante para rastrear quais aplicativos estão sendo usados e quais IDs de
     * aplicativo estão sendo usados para autorizar o acesso. Isso pode ajudar a monitorar quais aplicativos são mais
     * populares e quais podem ser mais vulneráveis a ataques.
     *
     * @var string
     */
    protected string $applicationId;

    /**
     * Usuário: Essa coluna é importante para rastrear quem está fazendo login na aplicação. É útil saber se a
     * autenticação está sendo feita usando credenciais do usuário ou se está sendo feita usando as credenciais do
     * próprio aplicativo.
     *
     * @var string
     */
    protected string $userId;

    /**
     * Localização: Essa coluna pode fornecer informações valiosas sobre onde os usuários estão localizados e como
     * eles estão acessando a aplicação. No entanto, é importante ter em mente que as informações de localização podem
     * não ser 100% precisas e podem ser facilmente falsificadas.
     *
     * @var string|null
     */
    protected ?string $countryIso2 = null;
    protected ?string $stateIso2 = null;
    protected ?string $city = null;
    protected ?float $latitude = null;
    protected ?float $longitude = null;
    protected ?string $timezone = null;

    /**
     * Provedor: Essa coluna pode ser útil para rastrear quem é o detentor do IP usado para acessar a aplicação. Isso
     * pode ser útil para identificar possíveis fontes de ataques ou tráfego malicioso.
     *
     * @var string|null
     */
    protected ?string $ans = null;
    protected ?string $isp = null;

    /**
     * Fluxo: Essa coluna é importante para rastrear qual fluxo do OAuth2 foi usado pelo usuário para autenticação ou
     * autorização. Isso pode ser usado para monitorar quais fluxos são mais populares e quais podem ser mais
     * vulneráveis a ataques, bem como identificar possíveis problemas de segurança ou privacidade na implementação do
     * OAuth2 na aplicação."
     *
     * @var string
     */
    protected string $flow;

    /**
     * Tipo: Essa coluna é útil para rastrear como a autenticação está sendo feita (por exemplo, usando cookies,
     * tokens, etc.). Isso pode ser útil para identificar possíveis vulnerabilidades na autenticação.
     *
     * @var string
     */
    protected string $type;

    /**
     * Tipo de expiração:  Isso pode ser útil para garantir que os usuários não tenham acesso prolongado à aplicação
     * após terem saído ou terem revogado o acesso, de acordo com o tipo de expiração definido.
     *
     * @var string
     */
    protected string $expireType;

    /**
     * Autorização: Essa coluna é importante para rastrear quando a autorização foi feita. Isso pode ser usado para
     * identificar possíveis tentativas de acesso não autorizado à aplicação.
     *
     * @var DateTime
     */
    protected DateTime $authorizedAt;

    /**
     * Última autenticação: Essa coluna é útil para rastrear quando foi gerado um novo access token com o refresh
     * token. Isso pode ser usado para identificar quanto tempo os usuários ficam conectados e quais são os padrões de
     * uso da aplicação.
     *
     * @var DateTime
     */
    protected DateTime $updatedAt;

    /**
     * Data de expiração: Isso pode ser útil para garantir que os usuários não tenham acesso prolongado à aplicação
     * após terem saído ou terem revogado o acesso, de acordo com o tipo de expiração definido. Se não houver uma data
     * de expiração definida para a sessão, retorna null."
     *
     * @var DateTime|null
     */
    protected ?DateTime $expireAt = null;

    /**
     * Id de requisição de autorização: Isso pode ser útil para rastrear e correlacionar as requisições com as sessões
     * e as atividades dos usuários e revogar
     *
     * @var string
     */
    protected string $requestId;

    private function __construct()
    {
    }

    /**
     * @return string
     */
    public function getDevice(): string
    {
        return $this->device;
    }

    /**
     * @return string
     */
    public function getPlatform(): string
    {
        return $this->platform;
    }

    /**
     * @return string
     */
    public function getApplicationId(): string
    {
        return $this->applicationId;
    }

    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->userId;
    }

    /**
     * @return string|null
     */
    public function getCountryIso2(): ?string
    {
        return $this->countryIso2;
    }

    /**
     * @return string|null
     */
    public function getStateIso2(): ?string
    {
        return $this->stateIso2;
    }

    /**
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @return float|null
     */
    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    /**
     * @return float|null
     */
    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    /**
     * @return string|null
     */
    public function getTimezone(): ?string
    {
        return $this->timezone;
    }

    /**
     * @return string|null
     */
    public function getAns(): ?string
    {
        return $this->ans;
    }

    /**
     * @return string|null
     */
    public function getIsp(): ?string
    {
        return $this->isp;
    }

    /**
     * @return string
     */
    public function getFlow(): string
    {
        return $this->flow;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getExpireType(): string
    {
        return $this->expireType;
    }

    /**
     * @return DateTime
     */
    public function getAuthorizedAt(): DateTime
    {
        return $this->authorizedAt;
    }

    /**
     * @return DateTime
     */
    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @return DateTime|null
     */
    public function getExpireAt(): ?DateTime
    {
        return $this->expireAt;
    }

    /**
     * @return string
     */
    public function getRequestId(): string
    {
        return $this->requestId;
    }

    public static function factory(SessionMetadataInterface $metadata): static
    {
        $s = new Session();
        $s->platform = $s->findPlatform($metadata->getUserAgent());
        switch ($s->platform) {
            case SessionMetadataInterface::PlatformAndroid:
            case SessionMetadataInterface::PlatformIPhone:
                $s->device = SessionMetadataInterface::DeviceMobile;
                break;
            case SessionMetadataInterface::PlatformIPad:
                $s->device = SessionMetadataInterface::DeviceTablet;
                break;
            case SessionMetadataInterface::PlatformWindows:
            case SessionMetadataInterface::PlatformMac:
            case SessionMetadataInterface::PlatformLinux:
            case SessionMetadataInterface::PlatformUnknown:
                $s->device = SessionMetadataInterface::DeviceDesktop;
                break;
        }
        $s->getLocalization($metadata->getIpAddress());
        $s->type = $metadata->getAuthorizationType();
        $s->flow = $metadata->getOAuth2Flow();
        $s->applicationId = $metadata->getApplicationId();
        $s->userId = $metadata->getUserId();
        $s->authorizedAt = $metadata->getAuthorizedAt();
        $s->updatedAt = $metadata->getUpdatedAt();
        $s->expireType = $metadata->getExpireType();
        $s->expireAt = $metadata->getExpireAt();
        $s->requestId = $metadata->getRequestId();
        return $s;
    }

    /**
     * Retorna a plataforma com base na string do User-Agent
     *
     * @param string $userAgent A string do User-Agent
     * @return string A plataforma correspondente
     */
    protected function findPlatform(string $userAgent): string
    {
        $platforms = [
            'Android' => SessionMetadataInterface::PlatformAndroid,
            'iPhone' => SessionMetadataInterface::PlatformIPhone,
            'iPad' => SessionMetadataInterface::PlatformIPad,
            'Windows' => SessionMetadataInterface::PlatformWindows,
            'Macintosh' => SessionMetadataInterface::PlatformMac,
            'Linux' => SessionMetadataInterface::PlatformLinux,
        ];

        // Procurar o nome da plataforma na string do User-Agent
        foreach ($platforms as $key => $value) {
            if (stripos($userAgent, $key) !== false) {
                return $value;
            }
        }

        // Se nenhuma plataforma for encontrada, retornar a plataforma desconhecida
        return SessionMetadataInterface::PlatformUnknown;
    }

    protected function getLocalization(string $ipAddress): void
    {
        $client = new Client();
        // Fazer uma solicitação GET à API do IPStack
        $secret = getenv('IP_STACK_SECRET');
        $response = $client->get('http://api.ipstack.com/' . $ipAddress . '?access_key=' . $secret);

        // Obter a resposta JSON e decodificá-la em um array associativo
        $data = json_decode($response->getBody(), true);

        // Obter as informações de localização do array associativo
        $this->countryIso2 = $data['country_code'] ?? null;
        $this->stateIso2 = $data['region_code'] ?? null;
        $this->city = $data['city'] ?? null;
        $this->latitude = $data['latitude'] ?? null;
        $this->longitude = $data['longitude'] ?? null;
        $this->timezone = isset($data['time_zone']) && isset($data['time_zone']['id']) ? $data['time_zone']['id'] : null;
        $this->ans = isset($data['connection']) && isset($data['connection']['asn']) ? $data['connection']['asn'] : null;
        $this->isp = isset($data['connection']) && isset($data['connection']['isp']) ? $data['connection']['isp'] : null;
    }

}