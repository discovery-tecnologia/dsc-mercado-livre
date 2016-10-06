<?php
/**
 * Class CityResponseBuilder
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Requests\Address;

use Dsc\MercadoLivre\Http\ResponseBuilder;

class CityResponseBuilder extends ResponseBuilder
{
    /**
     * @var string
     */
    const TARGET = City::class;

    /**
     * @return City
     */
    public function getResponse()
    {
        return $this->serializer->deserialize($this->response->getContents(), self::TARGET);
    }
}