<?php
/**
 * Class SellerAddress
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Requests\Product;

use JMS\Serializer\Annotation as JMS;
use Dsc\MercadoLivre\Requests\Address\City;
use Dsc\MercadoLivre\Requests\Address\State;
use Dsc\MercadoLivre\Requests\Address\Country;

class SellerAddress
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
    private $comment;

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

    //TODO mapping Search Location

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return SellerAddress
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     * @return SellerAddress
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
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
     * @return SellerAddress
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
     * @return SellerAddress
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
     * @return SellerAddress
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
     * @return SellerAddress
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
     * @return SellerAddress
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
     * @return SellerAddress
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
     * @return SellerAddress
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
        return $this;
    }
}