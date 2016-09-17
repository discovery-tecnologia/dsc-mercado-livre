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
     * @param $accessToken
     * @return mixed
     */
    public function getInformationAuthenticatedUser($accessToken)
    {
        $meli = $this->getMeli();
        if(! $accessToken) {
            throw MeliException::create(new Response(403, [], '{"message":"Access token not found - unauthorized.", "status":403}'));
        }
        $wsResource = sprintf('%s/users/me', $meli->getEnvironment()->getWsHost());
        $resource = new UserResource();
        $resource->setUrl($wsResource)
                 ->add('access_token', $accessToken);

        $response = $this->get($resource);

        return $this->serializer->deserialize($response->getContents(), User::class);
    }
}