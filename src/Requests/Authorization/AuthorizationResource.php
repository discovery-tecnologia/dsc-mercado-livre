<?php
/**
 * Class AuthorizationResource
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Requests\Authorization;

use Dsc\MercadoLivre\Http\AbstractMeliResource;

class AuthorizationResource extends AbstractMeliResource
{
    /**
     * @return string
     */
    public function getTargetEntity()
    {
        return Authorization::class;
    }
}