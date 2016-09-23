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
     * @return User
     */
    public function getInformationAuthenticatedUser($accessToken)
    {
        if(! $accessToken) {
            throw MeliException::create(new Response(403, [], '{"message":"Access token not found - unauthorized.", "status":403}'));
        }

        $resource = new UserResource();
        $resource->setPath('/users/me')
                 ->add('access_token', $accessToken);

        return $this->get($resource)->handle();
    }
}