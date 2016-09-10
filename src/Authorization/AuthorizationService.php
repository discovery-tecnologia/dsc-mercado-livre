<?php
namespace Dsc\MercadoLivre\Authorization;

use Doctrine\Common\Cache\Cache;
use Doctrine\Common\Cache\FilesystemCache;
use Dsc\MercadoLivre\Client;
use Dsc\MercadoLivre\Credentials;
use Dsc\MercadoLivre\Service;
use Psr\Http\Message\StreamInterface;

/**
 * @author Diego Wagner <diegowagner4@gmail.com>
 */
class AuthorizationService extends Service
{
    /**
     * @var Cache
     */
    private $cache;

    /**
     * @var string
     */
    private $redirectUri;

    public function __construct(Credentials $credentials, Client $client = null, Cache $cache = null)
    {
        parent::__construct($credentials, $client);
        $this->cache = $cache ?: new FilesystemCache(sys_get_temp_dir());
    }

    /**
     * @param string $resource
     * @param string $redirectUri
     * @return string
     */
    public function getAuthUrl($resource, $redirectUri)
    {
        $this->redirectUri = $redirectUri;
        $credential = $this->getCredential();
        $params = [
            "client_id"     => $credential->getMeli()->getClientId(),
            "response_type" => "code",
            "redirect_uri"  => $redirectUri
        ];
        return $this->getEnvironment()->getAuthUrl($credential->getSiteId(), $resource) . "?" . http_build_query($params);
    }

    /**
     * @param $region
     * @param null $redirectUri
     * @return StreamInterface
     */
    public function getAuthorizationCode($redirectUri = null)
    {
        if($redirectUri) {
            $this->getCredential()->setRefreshToken($redirectUri);
        }

        $credential = $this->getCredential();
        $params = [
            "response_type" => "code",
            "client_id"     => $credential->getMeli()->getClientId(),
            "redirect_uri"  => $redirectUri
        ];

        $wsUrl = sprintf('%s/%s', $this->getEnvironment()->getWsAuth($credential->getSiteId()), 'authorization');
        return $this->get($wsUrl, $params);
    }

    /**
     * Executes a POST Request to authorize the application and take an AccessToken.
     *
     * @param $code
     * @param $redirectUri
     * @return StreamInterface
     */
    public function authorize($code, $redirectUri = null)
    {
        $credential = $this->getCredential();
        $meli       = $credential->getMeli();

        $params = [
            "grant_type"    => "authorization_code",
            "client_id"     => $meli->getClientId(),
            "client_secret" => $meli->getClientSecret(),
            "code"          => $code,
            "redirect_uri"  => $redirectUri
        ];

        $oAuthUri = $this->getEnvironment()->getOAuthUri();
        return $this->post($oAuthUri, $params);
    }

    /**
     * Execute a POST Request to create a new AccessToken from a existent refresh_token
     * @return string|mixed
     */
    public function refreshAccessToken()
    {
        $credential = $this->getCredential();
        if(! $credential->getRefreshToken()) {
            $result = [
                'error'    => 'Offline-Access is not allowed.',
                'httpCode' => null
            ];
            return $result;
        }

        $meli = $credential->getMeli();
        $params = [
            "grant_type"    => "refresh_token",
            "client_id"     => $meli->getClientId(),
            "client_secret" => $meli->getClientSecret(),
            "refresh_token" => $credential->getRefreshToken()
        ];

        $oAuthUri = $this->getEnvironment()->getOAuthUri();
        return $this->post($oAuthUri, $params);
    }

    /**
     * @param null $code
     * @return mixed
     * @throws AuthorizationException
     */
    public function getAccessToken($code = null)
    {
        $accessToken = $this->cache->fetch('access_token');
        $credential  = $this->getCredential();
        //$accessToken = $credential->getAccessToken();
        // se existir o parametro code ou um token de acesso na sessao
        if(!$code && !$accessToken) {
            throw new AuthorizationException('User not authenticate.');
        }

        if($this->cache->contains('expires_in')) {
            if($this->cache->fetch('expires_in') >= time()) {
                return true;
            }
        }

        // Se existe o parametro code e o cache está vazio
        if($code && !($accessToken))  {
            // faz um pedido de autorizacao a API
            $response = $this->authorize($code, '/mercado-livre/autorize/');
        } else {
            // Make the refresh proccess
            $response = $this->refreshAccessToken();
        }

        $this->processResponseAndCached($response);
        $credential->setAccessToken($response['body']->access_token);
        $credential->setRefreshToken($response['body']->refresh_token);

        return $this->cache->fetch('access_token');
    }

    /**
     * @param $response
     * @throws AuthorizationException
     */
    private function processResponseAndCached($response)
    {
        if(! isset($response['httpCode']) && $response['httpCode'] != 200 ) {
            throw new AuthorizationException('Response is invalid to method authorize.');
        }
        // save data in cache
        $this->cache->save('access_token', $response['body']->access_token);
        $this->cache->save('expires_in', time() + $response['body']->expires_in);
        $this->cache->save('refresh_token', $response['body']->refresh_token);
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function isAuthorized()
    {
        try {
            return $this->getAccessToken();
        } catch (\Exception $e){
            throw $e;
        }
    }
}