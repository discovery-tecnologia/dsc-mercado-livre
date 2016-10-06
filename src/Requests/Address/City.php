<?php
/**
 * Class City
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Requests\Address;

use JMS\Serializer\Annotation as JMS;

class City
{
    /**
     * @var string
     * @JMS\Type("string")
     */
    private $id;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $name;

    /**
     * @var array
     * @JMS\Type("array")
     */
    private $geoInformation;

    /**
     * @var State
     * @JMS\Type("Dsc\MercadoLivre\Requests\Address\State")
     */
    private $state;

    /**
     * @var Country
     * @JMS\Type("Dsc\MercadoLivre\Requests\Address\Country")
     */
    private $country;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return City
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return City
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return array
     */
    public function getGeoInformation()
    {
        return $this->geoInformation;
    }

    /**
     * @param array $geoInformation
     * @return City
     */
    public function setGeoInformation($geoInformation)
    {
        $this->geoInformation = $geoInformation;
        return $this;
    }

    /**
     * @return State
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param State $state
     * @return City
     */
    public function setState(State $state)
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @return Country
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param Country $country
     * @return City
     */
    public function setCountry(Country $country)
    {
        $this->country = $country;
        return $this;
    }
}