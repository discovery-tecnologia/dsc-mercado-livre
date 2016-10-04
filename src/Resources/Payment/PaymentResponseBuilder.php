<?php
/**
 * Class PaymentResponseBuilder
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Resources\Payment;

use Dsc\MercadoLivre\Http\ResponseBuilder;

class PaymentResponseBuilder extends ResponseBuilder
{
    /**
     * @var string
     */
    const TARGET = Payment::class;

    /**
     * @return Payment
     */
    public function __invoke()
    {
        return $this->serializer->deserialize($this->response->getContents(), self::TARGET);
    }
}