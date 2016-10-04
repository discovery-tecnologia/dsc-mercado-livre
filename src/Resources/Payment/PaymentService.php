<?php
/**
 * Class PaymentService
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Resources\Payment;

use Dsc\MercadoLivre\Resources\ResourceService;
use Dsc\MercadoLivre\Resources\Service;

class PaymentService extends Service implements ResourceService
{
    /**
     * @param $code
     * @return Payment|mixed
     */
    public function findPayment($code)
    {
        return new PaymentResponseBuilder(
            $this->get(sprintf('/payments/%s', $code))
        );
    }
}