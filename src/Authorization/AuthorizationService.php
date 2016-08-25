<?php
namespace Dsc\MercadoLivre\Authorization;

use Dsc\MercadoLivre\Service;

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
}