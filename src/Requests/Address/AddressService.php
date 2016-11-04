<?php
/**
 * Class AddressService
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Requests\Address;

use Doctrine\Common\Collections\Collection;
use Dsc\MercadoLivre\Requests\Service;

class AddressService extends Service
{
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