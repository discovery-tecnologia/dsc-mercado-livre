<?php
/**
 * Class AuthorizationResponse
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Resources\Authorization;

use Dsc\MercadoLivre\Http\ResponseBuilder;

class AuthorizationResponseBuilder extends ResponseBuilder
{
    /**
     * @var string
     */
    const TARGET = Authorization::class;

    /**
     * @return Authorization
     */
    public function getResponse()
    {
        return $this->serializer->deserialize($this->response->getContents(), self::TARGET);
    }
}