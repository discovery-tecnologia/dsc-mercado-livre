<?php
/**
 * Class AddressService
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Requests\Address;

use Doctrine\Common\Collections\Collection;
use Dsc\MercadoLivre\Requests\RequestService;
use Dsc\MercadoLivre\Requests\Service;

class AddressService extends Service implements RequestService
{
    /**
     * @param string $code
     * @return City
     */
    public function findCity($code)
    {
        $builder = new CityResponseBuilder(
            $this->get(sprintf('/cities/%s', $code))
        );
        return $builder->getResponse();
    }

    /**
     * @param string $code
     * @return State
     */
    public function findState($code)
    {
        $builder = new StateResponseBuilder(
            $this->get(sprintf('/states/%s', $code))
        );
        return $builder->getResponse();
    }

    /**
     * @return Collection<Country>
     */
    public function findCountries()
    {
        $builder = new CountryResponseBuilder(
            $this->get('/countries')
        );
        return $builder->getResponse();
    }

    /**
     * @param string $code
     * @return Country
     */
    public function findCountry($code)
    {
        $builder = new CountryResponseBuilder(
            $this->get(sprintf('/countries/%s', $code))
        );
        return $builder->getResponse();
    }
}