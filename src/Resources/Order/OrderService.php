<?php
/**
 * Class OrderService
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Resources\Order;

use Doctrine\Common\Collections\Collection;
use Dsc\MercadoLivre\Resources\ResourceService;
use Dsc\MercadoLivre\Resources\Service;

class OrderService extends Service implements ResourceService
{
    /**
     * @param $orderId
     * @param $sellerId
     * @return Order
     */
    public function findOrderPerSeller($orderId, $sellerId)
    {
        $builder = new OrderResponseBuilder(
            $this->get('/orders/search', ['q' => $orderId, 'seller' => $sellerId])
        );
        return $builder->getResponse();
    }

    /**
     * @param $sellerId
     * @return Collection<Order>
     */
    public function findOrdersPerSeller($sellerId)
    {
        $builder = new OrderResponseBuilder(
            $this->get('/orders/search', ['seller' => $sellerId])
        );
        return $builder->getResponse();
    }

    /**
     * @param $buyerId
     * @return Collection<Order>
     */
    public function findOrdersPerBuyer($buyerId)
    {
        $builder = new OrderResponseBuilder(
            $this->get('/orders/search', ['buyer' => $buyerId])
        );
        return $builder->getResponse();
    }
}