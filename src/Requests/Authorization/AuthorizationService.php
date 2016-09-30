<?php
/**
 * Class AuthorizationService
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Requests\Authorization;

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
        $uri  = $meli->getEnvironment()->getWsAuth();
        $params = [
            'grant_type'   => 'code',
            'client_id'    => $meli->getClientId(),
            'redirect_uri' => $redirectUri
        ];

        $response = new AuthorizationResponseBuilder(
            $this->get($uri, $params),
            $this->getSerializer()
        );
        return $response->getResponse();
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
        $meli = $this->getMeli();
        $uri  = $meli->getEnvironment()->getOAuthUri();
        $data = [
            'grant_type'   => 'authorization_code',
            'client_id'    => $meli->getClientId(),
            'client_secret'=> $meli->getClientSecret(),
            'code'         => $code,
            'redirect_uri' => $redirectUri
        ];

        $response = new AuthorizationResponseBuilder(
            $this->post($uri, $data),
            $this->getSerializer()
        );
        return $response->getResponse();
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

        $uri  = $meli->getEnvironment()->getOAuthUri();
        $data = [
            'grant_type'    => 'refresh_token',
            'client_id'     => $meli->getClientId(),
            'client_secret' => $meli->getClientSecret(),
            'refresh_token' => $token
        ];

        $response = new AuthorizationResponseBuilder(
            $this->post($uri, $data),
            $this->getSerializer()
        );
        return $response->getResponse();
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
     * @throws MeliException
     */
    public function isAuthorized()
    {
        try {
            return $this->authorize();
        } catch (MeliException $e){
            throw $e;
        }
    }
}