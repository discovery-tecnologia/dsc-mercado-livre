<?php
/**
 * Class CurrencyService
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Requests\Currency;

use Doctrine\Common\Collections\Collection;
use Dsc\MercadoLivre\Requests\RequestService;
use Dsc\MercadoLivre\Requests\Service;

class CurrencyService extends Service implements RequestService
{
    /**
     * @return Collection<Currency>
     */
    public function findCurrencies()
    {
        $builder = new CurrencyResponseBuilder(
            $this->get('/currencies')
        );
        return $builder->getResponse();
    }

    /**
     * @param string $code
     * @return Currency
     */
    public function findCurrency($code)
    {
        $builder = new CurrencyResponseBuilder(
            $this->get(sprintf('/currencies/%s', $code))
        );
        return $builder->getResponse();
    }
}