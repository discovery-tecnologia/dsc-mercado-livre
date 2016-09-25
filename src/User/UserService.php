<?php
/**
 * Class UserService
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\User;

use Dsc\MercadoLivre\Service;

class UserService extends Service
{
    /**
     * @param $accessToken
     * @return User
     */
    public function getInformationAuthenticatedUser()
    {
        $accessToken = $this->getAccessToken();
        $resource = new UserResource();
        $resource->setPath('/users/me')
                 ->add('access_token', $accessToken);

        return $this->get($resource)->handle();
    }
}