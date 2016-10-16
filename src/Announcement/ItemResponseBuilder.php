<?php
/**
 * Class ItemResponseBuilder
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Announcement;

use Dsc\MercadoLivre\Http\ResponseBuilder;

class ItemResponseBuilder extends ResponseBuilder
{
    /**
     * @var string
     */
    const TARGET = ItemResponse::class;

    /**
     * @return ItemResponse
     */
    public function getResponse()
    {
        return $this->serializer->deserialize($this->response->getContents(), static::TARGET);
    }
}