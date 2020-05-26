<?php
/**
 * Class PersonAddress
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Resources\Shipment;

use Dsc\MercadoLivre\Requests\Address\City;
use Dsc\MercadoLivre\Requests\Address\Country;
use Dsc\MercadoLivre\Requests\Address\Municipality;
use Dsc\MercadoLivre\Requests\Address\Neighborhood;
use Dsc\MercadoLivre\Requests\Address\State;

use JMS\Serializer\Annotation as JMS;

class PersonAddress
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
    private $streetName;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $streetNumber;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $comment;

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
     * @var Neighborhood
     * @JMS\Type("Dsc\MercadoLivre\Requests\Address\Neighborhood")
     */
    private $neighborhood;

    /**
     * @var Municipality
     * @JMS\Type("Dsc\MercadoLivre\Requests\Address\Municipality")
     */
    private $municipality;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $agency;

    /**
     * @var array
     * @JMS\Type("array")
     */
    private $types;

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
     * @var string
     * @JMS\Type("string")
     */
    private $geolocationType;

    /**
     * @var \DateTime
     * @JMS\Type("DateTime<'Y-m-d\TH:i:sZ'>")
     */
    private $geolocationLastUpdated;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $geolocationSource;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $deliveryPreference;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $receiverName;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $receiverPhone;

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param integer $id
     * @return PersonAddress
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
     * @return PersonAddress
     */
    public function setAddressLine($addressLine)
    {
        $this->addressLine = $addressLine;
        return $this;
    }

    /**
     * @return string
     */
    public function getStreetName()
    {
        return $this->streetName;
    }

    /**
     * @param string $streetName
     * @return PersonAddress
     */
    public function setStreetName($streetName)
    {
        $this->streetName = $streetName;
        return $this;
    }

    /**
     * @return string
     */
    public function getStreetNumber()
    {
        return $this->streetNumber;
    }

    /**
     * @param string $streetNumber
     * @return PersonAddress
     */
    public function setStreetNumber($streetNumber)
    {
        $this->streetNumber = $streetNumber;
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
     * @return PersonAddress
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
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
     * @return PersonAddress
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
     * @return PersonAddress
     */
    public function setCity($city)
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
     * @return PersonAddress
     */
    public function setState($state)
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
     * @return PersonAddress
     */
    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @return Neighborhood
     */
    public function getNeighborhood()
    {
        return $this->neighborhood;
    }

    /**
     * @param Neighborhood $neighborhood
     * @return PersonAddress
     */
    public function setNeighborhood($neighborhood)
    {
        $this->neighborhood = $neighborhood;
        return $this;
    }

    /**
     * @return Municipality
     */
    public function getMunicipality()
    {
        return $this->municipality;
    }

    /**
     * @param Municipality $municipality
     * @return PersonAddress
     */
    public function setMunicipality($municipality)
    {
        $this->municipality = $municipality;
        return $this;
    }

    /**
     * @return string
     */
    public function getAgency()
    {
        return $this->agency;
    }

    /**
     * @param string $agency
     * @return PersonAddress
     */
    public function setAgency($agency)
    {
        $this->agency = $agency;
        return $this;
    }

    /**
     * @return array
     */
    public function getTypes()
    {
        return $this->types;
    }

    /**
     * @param array $types
     * @return PersonAddress
     */
    public function setTypes($types)
    {
        $this->types = $types;
        return $this;
    }

    /**
     * @return double
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param double $latitude
     * @return PersonAddress
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
        return $this;
    }

    /**
     * @return double
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param double $longitude
     * @return PersonAddress
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
        return $this;
    }

    /**
     * @return string
     */
    public function getGeolocationType()
    {
        return $this->geolocationType;
    }

    /**
     * @param string $geolocationType
     * @return PersonAddress
     */
    public function setGeolocationType($geolocationType)
    {
        $this->geolocationType = $geolocationType;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getGeolocationLastUpdated()
    {
        return $this->geolocationLastUpdated;
    }

    /**
     * @param \DateTime $geolocationLastUpdated
     * @return PersonAddress
     */
    public function setGeolocationLastUpdated($geolocationLastUpdated)
    {
        $this->geolocationLastUpdated = $geolocationLastUpdated;
        return $this;
    }

    /**
     * @return string
     */
    public function getGeolocationSource()
    {
        return $this->geolocationSource;
    }

    /**
     * @param string $geolocationSource
     * @return PersonAddress
     */
    public function setGeolocationSource($geolocationSource)
    {
        $this->geolocationSource = $geolocationSource;
        return $this;
    }

    /**
     * @return string
     */
    public function getDeliveryPreference()
    {
        return $this->deliveryPreference;
    }

    /**
     * @param string $deliveryPreference
     * @return PersonAddress
     */
    public function setDeliveryPreference($deliveryPreference)
    {
        $this->deliveryPreference = $deliveryPreference;
        return $this;
    }

    /**
     * @return string
     */
    public function getReceiverName()
    {
        return $this->receiverName;
    }

    /**
     * @param string $receiverName
     * @return PersonAddress
     */
    public function setReceiverName($receiverName)
    {
        $this->receiverName = $receiverName;
        return $this;
    }

    /**
     * @return string
     */
    public function getReceiverPhone()
    {
        return $this->receiverPhone;
    }

    /**
     * @param string $receiverPhone
     * @return PersonAddress
     */
    public function setReceiverPhone($receiverPhone)
    {
        $this->receiverPhone = $receiverPhone;
        return $this;
    }
}
