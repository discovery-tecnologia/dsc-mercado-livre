<?php
/**
 * Class AttributesResponse
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Requests\Category;

use Dsc\MercadoLivre\Http\ResponseBuilder;

class AttributesResponseBuilder extends ResponseBuilder
{
    /**
     * @var string
     */
    const TARGET = Attributes::class;

    public function getResponse()
    {
        return $this->serializer->deserialize($this->response->getContents(), self::TARGET);
    }
}