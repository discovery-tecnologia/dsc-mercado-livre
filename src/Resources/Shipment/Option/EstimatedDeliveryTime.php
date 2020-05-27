<?php
/**
 * Class EstimatedDeliveryTime
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Resources\Shipment\Option;

use JMS\Serializer\Annotation as JMS;

class EstimatedDeliveryTime
{
    /**
     * @var string
     * @JMS\Type("string")
     */
    private $type;

    /**
     * @var \DateTime
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s.u-03:00'>")
     */
    private $date;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $unit;

    /**
     * @var \DateTime
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s.u-03:00'>")
     */
    private $payBefore;

    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $shipping;

    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $handling;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $schedule;

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return EstimatedDeliveryTime
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     * @return EstimatedDeliveryTime
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return string
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * @param string $unit
     * @return EstimatedDeliveryTime
     */
    public function setUnit($unit)
    {
        $this->unit = $unit;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getPayBefore()
    {
        return $this->payBefore;
    }

    /**
     * @param \DateTime $payBefore
     * @return EstimatedDeliveryTime
     */
    public function setPayBefore($payBefore)
    {
        $this->payBefore = $payBefore;
        return $this;
    }

    /**
     * @return int
     */
    public function getShipping()
    {
        return $this->shipping;
    }

    /**
     * @param int $shipping
     * @return EstimatedDeliveryTime
     */
    public function setShipping($shipping)
    {
        $this->shipping = $shipping;
        return $this;
    }

    /**
     * @return int
     */
    public function getHandling()
    {
        return $this->handling;
    }

    /**
     * @param int $handling
     * @return EstimatedDeliveryTime
     */
    public function setHandling($handling)
    {
        $this->handling = $handling;
        return $this;
    }

    /**
     * @return string
     */
    public function getSchedule()
    {
        return $this->schedule;
    }

    /**
     * @param string $schedule
     * @return EstimatedDeliveryTime
     */
    public function setSchedule($schedule)
    {
        $this->schedule = $schedule;
        return $this;
    }
}
