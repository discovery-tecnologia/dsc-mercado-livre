<?php
/**
 * Class PaymentService
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Resources\Payment;

use Dsc\MercadoLivre\Resources\ResourceService;
use Dsc\MercadoLivre\BaseService;

class PaymentService extends BaseService implements ResourceService
{
    /**
     * @param $code
     * @return Payment
     */
    public function findPayment($code)
    {
        return $this->getResponse(
            $this->get('/payments/' . $code),
            Payment::class
        );
    }

    /**
     * @param $code
     * @return Payment
     */
    public function findPaymentOfSeller($code)
    {
        return $this->getResponse(
            $this->get('/collections/' . $code),
            Payment::class
        );
    }
}