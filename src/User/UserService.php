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
        $credential = $this->getCredential();
        $wsResourceCategory = sprintf('%s/sites/%s/categories', $this->getEnvironment()->getWsHost(), $credential->getSiteId());
        return $this->get($wsResourceCategory);

        try{

            $url = $this->getEnvironment()->getWsHost();
            $this->get($url . '/users');

        }catch (\Exception $e){
            return false;
        }
    }
}