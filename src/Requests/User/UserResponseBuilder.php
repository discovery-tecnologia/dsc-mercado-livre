<?php
/**
 * Class UserResponseBuilder
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Requests\Product;

use Dsc\MercadoLivre\Http\ResponseBuilder;
use Dsc\MercadoLivre\Requests\User\User;

class UserResponseBuilder extends ResponseBuilder
{
    /**
     * @var string
     */
    const TARGET = User::class;

    /**
     * @return mixed
     */
    public function getResponse()
    {
        return $this->serializer->deserialize($this->response->getContents(), self::TARGET);
    }
}