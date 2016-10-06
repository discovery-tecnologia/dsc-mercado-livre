<?php
/**
 * Class State
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Requests\Address;

use JMS\Serializer\Annotation as JMS;

class State
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
     * @var Country
     * @JMS\Type("Dsc\MercadoLivre\Requests\Address\Country")
     */
    private $country;

    //TODO Mapear as cidades se necessário

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return State
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
     * @return State
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
     * @return State
     */
    public function setGeoInformation($geoInformation)
    {
        $this->geoInformation = $geoInformation;
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
     * @return State
     */
    public function setCountry(Country $country)
    {
        $this->country = $country;
        return $this;
    }
}