<?php
/**
 * Class UserService
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Resources\User;

use Dsc\MercadoLivre\Environments\Site;
use Dsc\MercadoLivre\MeliException;
use Dsc\MercadoLivre\Resources\ResourceService;
use Dsc\MercadoLivre\Resources\Service;
use GuzzleHttp\Psr7\Response;

class UserService extends Service implements ResourceService
{
    /**
     * @param $accessToken
     * @return User
     */
    public function getInformationAuthenticatedUser()
    {
        $builder = new UserResponseBuilder(
            $this->get('/users/me')
        );
        return $builder->getResponse();
    }

    /**
     * @param null $site
     * @return string
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
        $builder = new UserResponseBuilder(
            $this->post('/users/test_user', $data)
        );
        return $builder->json();
    }
}