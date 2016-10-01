<?php
/**
 * Class UserService
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Requests\User;

use Dsc\MercadoLivre\Environments\Site;
use Dsc\MercadoLivre\MeliException;
use Dsc\MercadoLivre\Service;
use GuzzleHttp\Psr7\Response;

class UserService extends Service
{
    /**
     * @param $accessToken
     * @return User
     */
    public function getInformationAuthenticatedUser()
    {
        $accessToken = $this->getAccessToken();
        $builder = new UserResponseBuilder(
            $this->get('/users/me', ['access_token' => $accessToken]),
            $this->getSerializer()
        );
        return $builder->getResponse();
    }

    /**
     * @param null $site
     * @return UserResponseBuilder
     */
    public function createTestUser($site = null)
    {
        if(null === $site) {
            $site = $this->getMeli()->getEnvironment()->getSite();
        }

        if(! Site::isValid($site)) {
            throw MeliException::create(new Response(400, [], '{"message": "Site not found.", "status": 400}'));
        }

        $data = ['site_id' => $site];
        //$accessToken = $this->getAccessToken();
        return new UserResponseBuilder(
            $this->post('/users/test_users', $data, ['auth' => 'oauth']),
            $this->getSerializer()
        );
    }
}