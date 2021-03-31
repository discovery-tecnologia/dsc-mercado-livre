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
     * @param null $state
     * @return string
     */
    public function getOAuthUrl($redirectUri, $state = null)
    {
        $meli = $this->getMeli();
        $environment = $meli->getEnvironment();

        
        $params = [
            "client_id"     => $meli->getClientId(),
            "response_type" => "code",
            "redirect_uri"  => $redirectUri
        ];
        if ($state) {
            $params['state'] = $state;
        }
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
        $meli = $this->getMeli();
        $data = [
            'grant_type'    => 'authorization_code',
            'client_id'     => $meli->getClientId(),
            'client_secret' => $meli->getClientSecret(),
            'code'          => $code,
            'redirect_uri'  => $redirectUri
        ];
        return $this->getToken($data);
    }

    /**
     * @return string
     * @throws MeliException
     */
    public function getAccessToken()
    {
        $meli = $this->getMeli();
        $data = [
            'grant_type'    => 'client_credentials',
            'client_id'     => $meli->getClientId(),
            'client_secret' => $meli->getClientSecret()
        ];
        return $this->getToken($data);
    }

    /**
     * @param array $data
     * @return string
     * @throws MeliException
     */
    private function getToken($data)
    {
        $meli = $this->getMeli();
        $environment = $meli->getEnvironment(); 
        $uri     = $environment->getOAuthUri();
        $storage = $environment->getConfiguration()->getStorage();

        $authorization = $this->getResponse(
            $this->post($uri, $data, ['skipOAuth' => true]),
            Authorization::class
        );

        $tenant = $meli->getTenantId();
        $accessToken = new AccessToken($storage, $tenant);
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
        $meli = $this->getMeli();
        $environment = $meli->getEnvironment();
        $storage = $environment->getConfiguration()->getStorage();

        $tenant = $meli->getTenantId();
        $accessToken = new AccessToken($storage, $tenant);

        return $accessToken->isValid();
    }
}
