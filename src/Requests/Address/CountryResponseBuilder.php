<?php
/**
 * Class CountryResponseBuilder
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Requests\Address;

use Doctrine\Common\Collections\Collection;
use Dsc\MercadoLivre\Http\ResponseBuilder;

class CountryResponseBuilder extends ResponseBuilder
{
    /**
     * @var string
     */
    const TARGET = Country::class;

    /**
     * @return Country|Collection
     */
    public function getResponse()
    {
        return $this->serializer->deserialize($this->response->getContents(), static::TARGET);
    }
}