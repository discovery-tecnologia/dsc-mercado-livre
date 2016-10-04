<?php
/**
 * Class PaymentService
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Resources\Payment;

use Dsc\MercadoLivre\Resources\Service;

class PaymentService extends Service
{
    /**
     * @param $code
     * @return Payment
     */
    public function findPayment($code)
    {
        $builder = new PaymentResponseBuilder(
            $this->get(sprintf('/payments/%s', $code))
        );
        return $builder->getResponse();
    }
}