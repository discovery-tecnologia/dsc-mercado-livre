<?php
/**
 * Class CurrencyService
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Requests\Currency;

use Doctrine\Common\Collections\Collection;
use Dsc\MercadoLivre\Requests\Service;

class CurrencyService extends Service
{
    /**
     * @return Collection<Currency>
     */
    public function findCurrencies()
    {
        return $this->getResponse(
            $this->get('/currencies'),
            Currency::class
        );
    }

    /**
     * @param string $code
     * @return Currency
     */
    public function findCurrency($code)
    {
        return $this->getResponse(
            $this->get("/currencies/$code"),
            Currency::class
        );
    }
}