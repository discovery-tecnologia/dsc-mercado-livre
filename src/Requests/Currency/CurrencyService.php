<?php
/**
 * Class CurrencyService
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Requests\Currency;

use Doctrine\Common\Collections\Collection;
use Dsc\MercadoLivre\Client;
use Dsc\MercadoLivre\Meli;
use Dsc\MercadoLivre\MeliInterface;
use Dsc\MercadoLivre\Requests\RequestService;
use Dsc\MercadoLivre\BaseService;

class CurrencyService extends BaseService implements RequestService
{
    /**
     * CategoryService constructor.
     * @param MeliInterface|null $meli
     * @param Client|null $client
     */
    public function __construct(MeliInterface $meli = null, Client $client = null)
    {
        $credential = $meli ? $meli : new Meli(static::CLIENT_ID, static::CLIENT_SECRET);
        parent::__construct($credential, $client);
    }

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