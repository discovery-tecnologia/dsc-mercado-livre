<?php
/**
 * Class OrderResponseBuilder
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Resources\Order;

use Doctrine\Common\Collections\Collection;
use Dsc\MercadoLivre\Http\ResponseBuilder;

class OrderResponseBuilder extends ResponseBuilder
{
    /**
     * @var string
     */
    const TARGET = Order::class;

    /**
     * @return Order|Collection
     */
    public function getResponse()
    {
        return $this->serializer->deserialize($this->response->getContents(), self::TARGET);
    }
}