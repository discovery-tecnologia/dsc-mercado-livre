<?php
/**
 * Class OrderService
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Resources\Order;

use Dsc\MercadoLivre\Resources\ResourceService;
use Dsc\MercadoLivre\BaseService;

class OrderService extends BaseService implements ResourceService
{
    /**
     * @param $orderId
     * @return Order
     */
    public function findOrder($orderId)
    {
        return $this->getResponse(
            $this->get('/orders/' . $orderId),
            Order::class
        );
    }

    /**
     * @param $orderId
     * @return OrdersList
     */
    public function findOrdersBySeller($sellerId, $limit = 50, $offset = 0, $sort = 'date_desc')
    {
        return $this->getResponse(
            $this->get('/orders/search', [
                'seller' => $sellerId,
                'limit'  => $limit,
                'offset' => $offset,
                'sort'   => $sort
            ]),
            OrdersList::class
        );
    }
}