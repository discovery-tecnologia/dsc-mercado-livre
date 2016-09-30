<?php
/**
 * Class AuthorizationResponse
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Requests\Authorization;

use Dsc\MercadoLivre\Http\ResponseBuilder;

class AuthorizationResponseBuilder extends ResponseBuilder
{
    /**
     * @var string
     */
    const TARGET = Authorization::class;

    /**
     * @return mixed
     */
    public function getResponse()
    {
        return $this->serializer->deserialize($this->response->getContents(), self::TARGET);
    }
}