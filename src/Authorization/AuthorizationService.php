<?php
namespace Dsc\MercadoLivre\Authorization;

use Dsc\MercadoLivre\Service;
use Psr\Http\Message\StreamInterface;

/**
 * @author Diego Wagner <diegowagner4@gmail.com>
 */
class AuthorizationService extends Service
{
    /**
     * @var string
     */
    private $redirectUri;

    /**
     * @param string $resource
     * @param string $redirectUri
     * @return string
     */
    public function getAuthUrl($resource, $redirectUri)
    {
        $this->redirectUri = $redirectUri;
        $credential = $this->credentials->getCredential();
        $params = [
            "client_id"     => $credential->getClientId(),
            "response_type" => "code",
            "redirect_uri"  => $redirectUri
        ];
        return $this->credentials->getEnvironment()->getAuthUrl('MLB', $resource) . "?" . http_build_query($params);
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
        if($redirectUri) {
            $this->credentials->getCredential()->setRefreshToken($redirectUri);
        }

        $credential = $this->credentials->getCredential();
        $body = [
            "grant_type"    => "authorization_code",
            "client_id"     => $credential->getClientId(),
            "client_secret" => $credential->getClientSecret(),
            "code"          => $code,
            "redirect_uri"  => $redirectUri
        ];

        $oAuthUri = $this->credentials->getEnvironment()->getOAuthUri();
        return $this->post($oAuthUri, $body);
    }

    /**
     * Execute a POST Request to create a new AccessToken from a existent refresh_token
     * @return string|mixed
     */
    public function refreshAccessToken()
    {
        $credential = $this->credentials->getCredential();
        if(! $credential->getRefreshToken()) {
            $result = [
                'error'    => 'Offline-Access is not allowed.',
                'httpCode' => null
            ];
            return $result;
        }

        $body = [
            "grant_type"    => "refresh_token",
            "client_id"     => $credential->getClientId(),
            "client_secret" => $credential->getClientSecret(),
            "refresh_token" => $credential->getRefreshToken()
        ];

        $oAuthUri = $this->credentials->getEnvironment()->getOAuthUri();
        return $this->post($oAuthUri, $body);
    }


}