<?php
/**
 * Class ProductResponseBuilder
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Publish\Product;

use Dsc\MercadoLivre\Http\ResponseBuilder;

class ProductResponseBuilder extends ResponseBuilder
{
    /**
     * @var string
     */
    const TARGET = ProductResponse::class;

    /**
     * @return ProductResponse
     */
    public function getResponse()
    {
        return $this->serializer->deserialize($this->response->getContents(), static::TARGET);
    }
}