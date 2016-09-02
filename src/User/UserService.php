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

            $oAuthUri = $this->getEnvironment()->getWsHost();
            //$this->get('/users');

        }catch (\Exception $e){
            return false;
        }
    }
}