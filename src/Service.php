<?php
/**
 * Class Service
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre;

use Doctrine\Common\Cache\Cache;

/**
 * @author Diego Wagner <diegowagner4@gmail.com>
 */
class Service extends BaseService
{
    const ACCESS_TOKEN  = 'access_token';
    const REFRESH_TOKEN = 'refresh_token';
    const EXPIRE_IN     = 'expire_in';

    /**
     * @var Cache
     */
    protected $cache;

    /**
     * Service constructor.
     * @param MeliInterface $meli
     * @param Client|null $client
     */
    public function __construct(MeliInterface $meli, Client $client = null)
    {
        parent::__construct($meli, $client);
        $this->cache = $this->getMeli()->getEnvironment()->getConfiguration()->getCache();
    }


    /**
     * @return string|bool
     */
    public function getAccessToken()
    {
        return $this->cache->fetch(Service::ACCESS_TOKEN);
    }

    /**
     * @param string $accessToken
     */
    public function setAccessToken($accessToken)
    {
        $this->cache->save(Service::ACCESS_TOKEN, $accessToken);
    }

    /**
     * @return string
     */
    public function getRefreshToken()
    {
        return $this->cache->fetch(Service::REFRESH_TOKEN);
    }

    /**
     * @param string $refreshToken
     */
    public function setRefreshToken($refreshToken)
    {
        $this->cache->save(Service::REFRESH_TOKEN, $refreshToken);
    }

    /**
     * @return int
     */
    public function getExpireIn()
    {
        return $this->cache->fetch(Service::EXPIRE_IN);
    }

    /**
     * @param int $expireIn
     */
    public function setExpireIn($expireIn)
    {
        $this->cache->save(Service::EXPIRE_IN, $expireIn);
    }

    /**
     * @return bool
     */
    public function isExpired()
    {
        if($this->cache->contains('expires_in')) {
            if($this->cache->fetch('expires_in') >= time()) {
                return false;
            }
        }
        return true;
    }

    /**
     * @param string $redirectUri
     * @return string
     */
    public function getOAuthUrl($redirectUri)
    {
        $meli = $this->getMeli();
        $environment = $meli->getEnvironment();

        $params = [
            "client_id"     => $meli->getClientId(),
            "response_type" => "code",
            "redirect_uri"  => $redirectUri
        ];
        return $environment->getAuthUrl('/authorization') . "?" . http_build_query($params);
    }
}