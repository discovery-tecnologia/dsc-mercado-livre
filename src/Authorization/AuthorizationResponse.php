<?php
namespace Dsc\MercadoLivre\Authorization;

use Dsc\MercadoLivre\Http\MeliResponseInterface;

class AuthorizationResponse implements MeliResponseInterface
{
    /**
     * @return string
     */
    public function getEntityTarget()
    {
        return Authorization::class;
    }
}