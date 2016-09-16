<?php
/**
 * Class AuthorizationService
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Authorization;

use Dsc\MercadoLivre\MeliException;
use Dsc\MercadoLivre\Service;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\StreamInterface;

/**
 * @author Diego Wagner <diegowagner4@gmail.com>
 */
class AuthorizationService extends Service
{
    /**
     * @param string $resource
     * @param string $redirectUri
     * @return string
     */
    public function getAuthUrl($resource, $redirectUri)
    {
        $meli = $this->getMeli();
        $environment = $meli->getEnvironment();

        $params = [
            "client_id"     => $meli->getClientId(),
            "response_type" => "code",
            "redirect_uri"  => $redirectUri
        ];
        return $environment->getAuthUrl($resource) . "?" . http_build_query($params);
    }

    /**
     * @param $region
     * @param null $redirectUri
     * @return StreamInterface
     */
    public function getAuthorizationCode($redirectUri = null)
    {
        $meli  = $this->getMeli();
        $wsUrl = sprintf('%s/%s', $meli->getEnvironment()->getWsAuth(), 'authorization');

        $resource = new AuthorizationResource();
        $resource->setUrl($wsUrl)
                 ->add('grant_type', 'code')
                 ->add('client_id', $meli->getClientId())
                 ->add('redirect_url', $redirectUri);

        return $this->get($resource);
    }

    /**
     * Executes a POST Request to authorize the application and take an AccessToken.
     *
     * @param $code
     * @param $redirectUri
     * @return Authorization
     */
    public function authorize($code, $redirectUri = null)
    {
        $meli       = $this->getMeli();
        $oAuthUri   = $meli->getEnvironment()->getOAuthUri();

        $resource = new AuthorizationResource();
        $resource->setUrl($oAuthUri)
                 ->add('grant_type', 'authorization_code')
                 ->add('client_id', $meli->getClientId())
                 ->add('client_secret', $meli->getClientSecret())
                 ->add('code', $code)
                 ->add('redirect_url', $redirectUri);

        $response = $this->post($resource);

        return $this->serializer->deserialize($response->getContents(), Authorization::class);
    }

    /**
     * Execute a POST Request to create a new AccessToken from a existent refresh_token
     *
     * @param string $tokenParam = null
     * @return Authorization
     * @throws MeliException
     */
    public function refreshAccessToken($tokenParam = null)
    {
        $cache = $this->getMeli()
                      ->getEnvironment()
                      ->getConfiguration()
                      ->getCache();

        $refreshToken = $cache->fetch('refresh_token');

        if(! $tokenParam && ! $refreshToken) {
            throw MeliException::create(new Response(403, [], '{"message":"Offline-Access is not allowed.", "status":403}'));
        }

        $token = $refreshToken ? $refreshToken : $tokenParam;
        $meli  = $this->getMeli();

        $oAuthUri = $meli->getEnvironment()->getOAuthUri();

        $resource = new AuthorizationResource();
        $resource->setUrl($oAuthUri)
                 ->add('grant_type', 'refresh_token')
                 ->add('client_id', $meli->getClientId())
                 ->add('client_secret', $meli->getClientSecret())
                 ->add('refresh_token', $token);

        $response = $this->post($resource);

        return $this->serializer->deserialize($response->getContents(), Authorization::class);
    }

    /**
     * @param null $code
     * @param null $redirectUrl
     * @return string
     * @throws MeliException
     */
    public function getAccessToken($code = null, $redirectUrl = null)
    {
        $cache = $this->getMeli()
                      ->getEnvironment()
                      ->getConfiguration()
                      ->getCache();

        $accessToken = $cache->fetch('access_token');
        // se existir o parametro code ou um token de acesso na sessao
        if(! $code && ! $accessToken) {
            throw MeliException::create(new Response(403, [], '{"message":"User not authenticate - unauthorized", "status":403}'));
        }

        if($cache->contains('expires_in')) {
            if($cache->fetch('expires_in') >= time()) {
                return $accessToken;
            }
        }

        // Se existe o parametro code e o cache está vazio
        if($code && !($accessToken))  {
            // faz um pedido de autorizacao a API
            $authorization = $this->authorize($code, $redirectUrl);
        } else {
            // Refresh token
            $authorization = $this->refreshAccessToken();
        }
        // save data in cache
        $cache->save('access_token', $authorization->getAccessToken());
        $cache->save('expires_in', time() + $authorization->getExpiresIn());
        $cache->save('refresh_token', $authorization->getRefreshToken());

        return $cache->fetch('access_token');
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