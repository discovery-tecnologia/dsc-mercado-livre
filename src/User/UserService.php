<?php
namespace Dsc\MercadoLivre\User;

use Dsc\MercadoLivre\Service;

class UserService extends Service
{
    /**
     * @return bool
     */
    public function getAccountInformation($id, $accessToken)
    {
        try{

            $url = $this->getEnvironment()->getWsHost();
            $this->get($url . '/users');

        }catch (\Exception $e){
            return false;
        }
    }
}