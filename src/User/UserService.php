<?php
/**
 * Class UserService
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\User;

use Dsc\MercadoLivre\MeliException;
use Dsc\MercadoLivre\Service;
use GuzzleHttp\Psr7\Response;

class UserService extends Service
{
    /**
     * @return bool
     */
    public function getInformationAuthenticatedUser($accessToken = null)
    {
        $credential = $this->getCredential();
        if(! $credential->getAccessToken() && ! $accessToken) {
            throw MeliException::create(new Response(403, [], '{"message":"Access token not found - unauthorized.", "status":403}'));
        }

        $token = $accessToken ? $accessToken : $credential->getAccessToken();
        $params = [
            'access_token' => $token
        ];

        $wsResource = sprintf('%s/users/me', $this->getEnvironment()->getWsHost());
        $response = $this->get($wsResource, $params);

        return $this->serializer->deserialize($response->getContents(), User::class);
    }
}