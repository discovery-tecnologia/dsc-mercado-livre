<?php
/**
 * Class AuthorizationService
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Resources\Authorization;

use Dsc\MercadoLivre\AccessToken;
use Dsc\MercadoLivre\Http\ResponseBuilder;
use Dsc\MercadoLivre\MeliException;
use Dsc\MercadoLivre\Resources\ResourceService;
use Dsc\MercadoLivre\BaseService;

/**
 * @author Diego Wagner <diegowagner4@gmail.com>
 */
class AuthorizationService extends BaseService implements ResourceService
{
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

    /**
     * @param $region
     * @param null $redirectUri
     * @return string
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

        $builder = new ResponseBuilder(
            $this->get($uri, $params),
            Authorization::class,
            $this->getSerializer()
        );
        return $builder->json();
    }

    /**
     * @param string $code
     * @param string $redirectUrl
     * @return string
     * @throws MeliException
     */
    public function authorize($code, $redirectUri)
    {
        $meli    = $this->getMeli();
        $uri     = $meli->getEnvironment()->getOAuthUri();
        $storage = $meli->getEnvironment()->getConfiguration()->getStorage();

        $data = [
            'grant_type'    => 'authorization_code',
            'client_id'     => $meli->getClientId(),
            'client_secret' => $meli->getClientSecret(),
            'code'          => $code,
            'redirect_uri'  => $redirectUri
        ];

        $authorization = $this->getResponse(
            $this->post($uri, $data, ['skipOAuth' => true]),
            Authorization::class
        );

        $accessToken = new AccessToken($storage);
        $accessToken->setToken($authorization->getAccessToken());
        $accessToken->setRefreshToken($authorization->getRefreshToken());
        $accessToken->setExpireIn($authorization->getExpiresIn());

        return $accessToken->getToken();
    }

    /**
     * @return bool
     */
    public function isAuthorized()
    {
        $meli    = $this->getMeli();
        $storage = $meli->getEnvironment()->getConfiguration()->getStorage();

        $accessToken = new AccessToken($storage);

        return $accessToken->isValid();
    }
}
