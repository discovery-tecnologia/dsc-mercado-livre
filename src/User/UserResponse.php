<?php
/**
 * Class UserResponse
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\User;

use Dsc\MercadoLivre\Http\MeliResponseInterface;

class UserResponse implements MeliResponseInterface
{
    /**
     * @return string
     */
    public function getEntityTarget()
    {
        return User::class;
    }
}