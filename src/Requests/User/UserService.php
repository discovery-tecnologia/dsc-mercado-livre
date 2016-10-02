<?php
/**
 * Class UserService
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Requests\User;

use Dsc\MercadoLivre\BaseService;
use Dsc\MercadoLivre\Environments\Site;
use Dsc\MercadoLivre\MeliException;
use GuzzleHttp\Psr7\Response;

class UserService extends BaseService
{
    /**
     * @param $accessToken
     * @return User
     */
    public function getInformationAuthenticatedUser()
    {
        $builder = new UserResponseBuilder(
            $this->get('/users/me'),
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
            $site = $this->getMeli() ? $this->getMeli()->getEnvironment()->getSite() : null;
        }

        if(! Site::isValid($site)) {
            throw MeliException::create(new Response(400, [], '{"message": "Site not found.", "status": 400}'));
        }

        $data = ['site_id' => $site];
        return new UserResponseBuilder(
            $this->post('/users/test_user', $data),
            $this->getSerializer()
        );
    }
}