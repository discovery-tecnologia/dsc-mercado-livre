<?php
/**
 * Class StateResponseBuilder
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Requests\Address;

use Doctrine\Common\Collections\Collection;
use Dsc\MercadoLivre\Http\ResponseBuilder;

class StateResponseBuilder extends ResponseBuilder
{
    /**
     * @var string
     */
    const TARGET = State::class;

    /**
     * @return State|Collection
     */
    public function getResponse()
    {
        return $this->serializer->deserialize($this->response->getContents(), static::TARGET);
    }
}