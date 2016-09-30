<?php
/**
 * Class CategoryResponse
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Requests\Category;

use Dsc\MercadoLivre\Http\ResponseBuilder;

class CategoryResponseBuilder extends ResponseBuilder
{
    /**
     * @var string
     */
    const TARGET = Category::class;

    /**
     * @return mixed
     */
    public function getResponse()
    {
        return $this->serializer->deserialize($this->response->getContents(), self::TARGET);
    }
}