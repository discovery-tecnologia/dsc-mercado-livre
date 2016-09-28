<?php
/**
 * Class UserResource
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Requests\User;

use Dsc\MercadoLivre\Http\AbstractMeliResource;

class UserResource extends AbstractMeliResource
{
    /**
     * @return string
     */
    public function getTargetEntity()
    {
        return User::class;
    }
}