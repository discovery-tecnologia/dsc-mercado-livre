<?php
/**
 * Class ReceiverAddress
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Resources\Order;

use Dsc\MercadoLivre\Requests\Address\City;
use Dsc\MercadoLivre\Requests\Address\Country;
use Dsc\MercadoLivre\Requests\Address\State;
use JMS\Serializer\Annotation as JMS;

class ReceiverAddress
{
    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $id;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $addressLine;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $zipCode;

    /**
     * @var City
     * @JMS\Type("Dsc\MercadoLivre\Requests\Address\City")
     */
    private $city;

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
     * @var double
     * @JMS\Type("double")
     */
    private $latitude;

    /**
     * @var double
     * @JMS\Type("double")
     */
    private $longitude;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return ReceiverAddress
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddressLine()
    {
        return $this->addressLine;
    }

    /**
     * @param string $addressLine
     * @return ReceiverAddress
     */
    public function setAddressLine($addressLine)
    {
        $this->addressLine = $addressLine;
        return $this;
    }

    /**
     * @return string
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * @param string $zipCode
     * @return ReceiverAddress
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;
        return $this;
    }

    /**
     * @return City
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param City $city
     * @return ReceiverAddress
     */
    public function setCity(City $city)
    {
        $this->city = $city;
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
     * @return ReceiverAddress
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
     * @return ReceiverAddress
     */
    public function setCountry(Country $country)
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param float $latitude
     * @return ReceiverAddress
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
        return $this;
    }

    /**
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param float $longitude
     * @return ReceiverAddress
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
        return $this;
    }
}