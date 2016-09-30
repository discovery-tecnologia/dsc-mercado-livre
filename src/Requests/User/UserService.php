<?php
/**
 * Class UserService
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Requests\User;

use Dsc\MercadoLivre\Requests\Product\UserResponseBuilder;
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
        $response = new UserResponseBuilder(
            $this->get('/users/me', ['access_token' => $accessToken]),
            $this->getSerializer()
        );
        return $response->getResponse();
    }
}