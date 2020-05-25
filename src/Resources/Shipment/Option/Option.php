<?php
/**
 * Class Option
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Resources\Shipment\Option;

use JMS\Serializer\Annotation as JMS;

class Option
{
    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $id;

    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $shippingMethodId;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $name;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $currencyId;

    /**
     * @var double
     * @JMS\Type("double")
     */
    private $listCost;

    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $cost;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $deliveryType;

    /**
     * @var EstimatedDeliveryTime
     * @JMS\Type("Dsc\MercadoLivre\Resources\Shipment\Option\EstimatedDeliveryTime")
     */
    private $estimatedDeliveryTime;

    /**
     * @var EstimatedDelivery
     * @JMS\Type("Dsc\MercadoLivre\Resources\Shipment\Option\EstimatedDelivery")
     */
    private $estimatedScheduleLimit;

    /**
     * @var EstimatedDelivery
     * @JMS\Type("Dsc\MercadoLivre\Resources\Shipment\Option\EstimatedDelivery")
     */
    private $estimatedDeliveryLimit;

    /**
     * @var EstimatedDelivery
     * @JMS\Type("Dsc\MercadoLivre\Resources\Shipment\Option\EstimatedDelivery")
     */
    private $estimatedDeliveryFinal;

    /**
     * @var EstimatedDelivery
     * @JMS\Type("Dsc\MercadoLivre\Resources\Shipment\Option\EstimatedDelivery")
     */
    private $estimatedDeliveryExtended;

    /**
     * @var EstimatedDelivery
     * @JMS\Type("Dsc\MercadoLivre\Resources\Shipment\Option\EstimatedDelivery")
     */
    private $estimatedHandlingLimit;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Option
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getShippingMethodId()
    {
        return $this->shippingMethodId;
    }

    /**
     * @param int $shippingMethodId
     * @return Option
     */
    public function setShippingMethodId($shippingMethodId)
    {
        $this->shippingMethodId = $shippingMethodId;
        return $this;
    }

    /**
     * @return Option
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Option
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * @return Option
     */
    public function setCurrencyId($currencyId)
    {
        $this->currencyId = $currencyId;
        return $this;
    }

    /**
     * @return float
     */
    public function getListCost()
    {
        return $this->listCost;
    }

    /**
     * @param float $listCost
     * @return Option
     */
    public function setListCost($listCost)
    {
        $this->listCost = $listCost;
        return $this;
    }

    /**
     * @return int
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * @param int $cost
     * @return Option
     */
    public function setCost($cost)
    {
        $this->cost = $cost;
        return $this;
    }

    /**
     * @return string
     */
    public function getDeliveryType()
    {
        return $this->deliveryType;
    }

    /**
     * @param string $deliveryType
     * @return Option
     */
    public function setDeliveryType($deliveryType)
    {
        $this->deliveryType = $deliveryType;
        return $this;
    }

    /**
     * @return EstimatedDeliveryTime
     */
    public function getEstimatedDeliveryTime()
    {
        return $this->estimatedDeliveryTime;
    }

    /**
     * @param EstimatedDeliveryTime $estimatedDeliveryTime
     * @return Option
     */
    public function setEstimatedDeliveryTime($estimatedDeliveryTime)
    {
        $this->estimatedDeliveryTime = $estimatedDeliveryTime;
        return $this;
    }

    /**
     * @return EstimatedDelivery
     */
    public function getEstimatedScheduleLimit()
    {
        return $this->estimatedScheduleLimit;
    }

    /**
     * @param EstimatedDelivery $estimatedScheduleLimit
     * @return Option
     */
    public function setEstimatedScheduleLimit($estimatedScheduleLimit)
    {
        $this->estimatedScheduleLimit = $estimatedScheduleLimit;
        return $this;
    }

    /**
     * @return EstimatedDelivery
     */
    public function getEstimatedDeliveryLimit()
    {
        return $this->estimatedDeliveryLimit;
    }

    /**
     * @param EstimatedDelivery $estimatedDeliveryLimit
     * @return Option
     */
    public function setEstimatedDeliveryLimit($estimatedDeliveryLimit)
    {
        $this->estimatedDeliveryLimit = $estimatedDeliveryLimit;
        return $this;
    }

    /**
     * @return EstimatedDelivery
     */
    public function getEstimatedDeliveryFinal()
    {
        return $this->estimatedDeliveryFinal;
    }

    /**
     * @param EstimatedDelivery $estimatedDeliveryFinal
     * @return Option
     */
    public function setEstimatedDeliveryFinal($estimatedDeliveryFinal)
    {
        $this->estimatedDeliveryFinal = $estimatedDeliveryFinal;
        return $this;
    }

    /**
     * @return EstimatedDelivery
     */
    public function getEstimatedDeliveryExtended()
    {
        return $this->estimatedDeliveryExtended;
    }

    /**
     * @param EstimatedDelivery $estimatedDeliveryExtended
     * @return Option
     */
    public function setEstimatedDeliveryExtended($estimatedDeliveryExtended)
    {
        $this->estimatedDeliveryExtended = $estimatedDeliveryExtended;
        return $this;
    }

    /**
     * @return EstimatedDelivery
     */
    public function getEstimatedHandlingLimit()
    {
        return $this->estimatedHandlingLimit;
    }

    /**
     * @param EstimatedDelivery $estimatedHandlingLimit
     * @return Option
     */
    public function setEstimatedHandlingLimit($estimatedHandlingLimit)
    {
        $this->estimatedHandlingLimit = $estimatedHandlingLimit;
        return $this;
    }
}
