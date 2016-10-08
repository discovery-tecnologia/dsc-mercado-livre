<?php
/**
 * Class OrderService
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Resources\Order;

use Dsc\MercadoLivre\Resources\ResourceService;
use Dsc\MercadoLivre\Resources\Service;

class OrderService extends Service implements ResourceService
{
    /**
     * @param $orderId
     * @return Order
     */
    public function findOrder($orderId)
    {
        $builder = new OrderResponseBuilder(
            $this->get(sprintf('/orders/%s', $orderId))
        );
        return $builder->getResponse();
    }
}