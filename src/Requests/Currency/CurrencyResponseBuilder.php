<?php
/**
 * Class CurrencyResponseBuilder
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Requests\Currency;

use Doctrine\Common\Collections\Collection;
use Dsc\MercadoLivre\Http\ResponseBuilder;

class CurrencyResponseBuilder extends ResponseBuilder
{
    /**
     * @var string
     */
    const TARGET = Currency::class;

    /**
     * @return Currency|Collection
     */
    public function getResponse()
    {
        return $this->serializer->deserialize($this->response->getContents(), static::TARGET);
    }
}