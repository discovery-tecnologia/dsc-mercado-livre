<?php
/**
 * Class AddressService
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Requests\Address;

use Doctrine\Common\Collections\Collection;
use Dsc\MercadoLivre\Client;
use Dsc\MercadoLivre\Meli;
use Dsc\MercadoLivre\MeliInterface;
use Dsc\MercadoLivre\Requests\RequestService;
use Dsc\MercadoLivre\BaseService;

class AddressService extends BaseService implements RequestService
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
     * @param string $code
     * @return City
     */
    public function findCity($code)
    {
        return $this->getResponse(
            $this->get('/cities/' . $code),
            City::class
        );
    }

    /**
     * @param string $code
     * @return State
     */
    public function findState($code)
    {
        return $this->getResponse(
            $this->get('/states/' . $code),
            State::class
        );
    }

    /**
     * @return Collection<Country>
     */
    public function findCountries()
    {
        return $this->getResponse(
            $this->get('/countries'),
            Country::class
        );
    }

    /**
     * @param string $code
     * @return Country
     */
    public function findCountry($code)
    {
        return $this->getResponse(
            $this->get('/countries/' . $code),
            Country::class
        );
    }
}