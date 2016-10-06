<?php
/**
 * Class Country
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Requests\Address;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use JMS\Serializer\Annotation as JMS;

class Country
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
     * @var string
     * @JMS\Type("string")
     */
    private $locale;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $currencyId;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $decimalSeparator;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $thousandsSeparator;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $timeZone;

    /**
     * @var array
     * @JMS\Type("array")
     */
    private $geoInformation;

    /**
     * @var ArrayCollection
     * @JMS\Type("ArrayCollection<Dsc\MercadoLivre\Requests\Address\State>")
     */
    private $states;

    /**
     * Country constructor.
     */
    public function __construct()
    {
        $this->states = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Country
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
     * @return Country
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * @param string $locale
     * @return Country
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;
        return $this;
    }

    /**
     * @return string
     */
    public function getCurrencyId()
    {
        return $this->currencyId;
    }

    /**
     * @param string $currencyId
     * @return Country
     */
    public function setCurrencyId($currencyId)
    {
        $this->currencyId = $currencyId;
        return $this;
    }

    /**
     * @return string
     */
    public function getDecimalSeparator()
    {
        return $this->decimalSeparator;
    }

    /**
     * @param string $decimalSeparator
     * @return Country
     */
    public function setDecimalSeparator($decimalSeparator)
    {
        $this->decimalSeparator = $decimalSeparator;
        return $this;
    }

    /**
     * @return string
     */
    public function getThousandsSeparator()
    {
        return $this->thousandsSeparator;
    }

    /**
     * @param string $thousandsSeparator
     * @return Country
     */
    public function setThousandsSeparator($thousandsSeparator)
    {
        $this->thousandsSeparator = $thousandsSeparator;
        return $this;
    }

    /**
     * @return string
     */
    public function getTimeZone()
    {
        return $this->timeZone;
    }

    /**
     * @param string $timeZone
     * @return Country
     */
    public function setTimeZone($timeZone)
    {
        $this->timeZone = $timeZone;
        return $this;
    }

    /**
     * @return string
     */
    public function getGeoInformation()
    {
        return $this->geoInformation;
    }

    /**
     * @param string $geoInformation
     * @return Country
     */
    public function setGeoInformation($geoInformation)
    {
        $this->geoInformation = $geoInformation;
        return $this;
    }

    /**
     * @return Collection
     */
    public function getStates()
    {
        return $this->states;
    }

    /**
     * @param State $state
     * @return $this
     */
    public function addState(State $state)
    {
        $this->states->add($state);
        return $this;
    }

    /**
     * @param State $state
     * @return $this
     */
    public function removeState(State $state)
    {
        $this->states->remove($state);
        return $this;
    }

    /**
     * @param Collection $states
     * @return Country
     */
    public function setStates(Collection $states)
    {
        $this->states = $states;
        return $this;
    }
}