<?php

/**
 * Class MessageService
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */

namespace Dsc\MercadoLivre\Resources\Message;

use Dsc\MercadoLivre\BaseService;
use Dsc\MercadoLivre\Resources\ResourceService;

class MessageService extends BaseService implements ResourceService
{
    /**
     * @param Message $message
     * @param integer $orderId Caso você possua o pack_id, pode utilizar no lugar do order_id ($orderId)
     * @param integer $sellerId
     *
     * @return MessageResponse
     * @link https://developers.mercadolivre.com.br/pt_br/mensagens-post-venda
     */
    public function send(Message $message, $orderId, $sellerId)
    {
        return $this->getResponse(
            $this->post("/messages/packs/$orderId/sellers/$sellerId", $message),
            MessageResponse::class
        );
    }
}
