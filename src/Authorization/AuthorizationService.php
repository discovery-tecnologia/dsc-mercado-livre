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
     * @param $region
     * @param null $redirectUri
     * @return StreamInterface
     */
    public function getAuthorizationCode($redirectUri = null)
    {
        $meli = $this->getMeli();
        $wsAuth = $meli->getEnvironment()->getWsAuth();
        $resource = new AuthorizationResource();
        $resource->setPath($wsAuth . '/authorization')
                 ->add('grant_type', 'code')
                 ->add('client_id', $meli->getClientId())
                 ->add('redirect_url', $redirectUri);

        return $this->get($resource)->response();
    }

    /**
     * Executes a POST Request to authorize the application and take an AccessToken.
     *
     * @param $code
     * @param $redirectUri
     * @return Authorization
     */
    private function requestAuthorization($code, $redirectUri = null)
    {
        $meli       = $this->getMeli();
        $oAuthUri   = $meli->getEnvironment()->getOAuthUri();

        $resource = new AuthorizationResource();
        $resource->setPath($oAuthUri)
                 ->add('grant_type', 'authorization_code')
                 ->add('client_id', $meli->getClientId())
                 ->add('client_secret', $meli->getClientSecret())
                 ->add('code', $code)
                 ->add('redirect_url', $redirectUri);

        return $this->post($resource)->handle();
    }

    /**
     * Execute a POST Request to create a new AccessToken from a existent refresh_token
     *
     * @param string $tokenParam = null
     * @return Authorization
     * @throws MeliException
     */
    private function refreshAccessToken($tokenParam = null)
    {
        $refreshToken = $this->getRefreshToken();

        if(! $tokenParam && ! $refreshToken) {
            throw MeliException::create(new Response(403, [], '{"message":"Offline-Access is not allowed.", "status":403}'));
        }

        $token = $refreshToken ? $refreshToken : $tokenParam;
        $meli  = $this->getMeli();

        $oAuthUri = $meli->getEnvironment()->getOAuthUri();

        $resource = new AuthorizationResource();
        $resource->setPath($oAuthUri)
                 ->add('grant_type', 'refresh_token')
                 ->add('client_id', $meli->getClientId())
                 ->add('client_secret', $meli->getClientSecret())
                 ->add('refresh_token', $token);

        return $this->post($resource)->handle();
    }

    /**
     * @param null $code
     * @param null $redirectUrl
     * @return string
     * @throws MeliException
     */
    public function authorize($code = null, $redirectUrl = null)
    {
        $accessToken = $this->getAccessToken();
        // se existir o parametro code ou um token de acesso na sessao
        if(! $code && ! $accessToken) {
            throw MeliException::create(new Response(403, [], '{"message":"User not authenticate - unauthorized", "status":403}'));
        }

        if(! $this->isExpired()) {
            return $accessToken;
        }
        // Se existe o parametro code e o cache está vazio
        if($code && !($accessToken))  {
            // faz um pedido de autorizacao a API
            $authorization = $this->requestAuthorization($code, $redirectUrl);
        } else {
            // Refresh token
            $authorization = $this->refreshAccessToken();
        }

        $this->setAccessToken($authorization->getAccessToken());
        $this->setRefreshToken($authorization->getRefreshToken());
        $this->setExpireIn(time() + $authorization->getExpiresIn());

        return $this->getAccessToken();
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function isAuthorized()
    {
        try {
            return $this->authorize();
        } catch (\Exception $e){
            throw $e;
        }
    }
}