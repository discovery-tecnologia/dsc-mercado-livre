<?php
/**
 * Class StatusHistory
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Resources\Shipment;

use JMS\Serializer\Annotation as JMS;

class StatusHistory
{
    /**
     * @var \DateTime
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s.u-04:00'>")
     */
    private $dateCancelled;

    /**
     * @var \DateTime
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s.u-04:00'>")
     */
    private $dateDelivered;

    /**
     * @var \DateTime
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s.u-04:00'>")
     */
    private $dateFirstVisit;

    /**
     * @var \DateTime
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s.u-04:00'>")
     */
    private $dateHandling;

    /**
     * @var \DateTime
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s.u-04:00'>")
     */
    private $dateNotDelivered;

    /**
     * @var \DateTime
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s.u-04:00'>")
     */
    private $dateReadyToShip;

    /**
     * @var \DateTime
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s.u-04:00'>")
     */
    private $dateShipped;

    /**
     * @var \DateTime
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s.u-04:00'>")
     */
    private $dateReturned;

    /**
     * @return \DateTime
     */
    public function getDateCancelled()
    {
        return $this->dateCancelled;
    }

    /**
     * @param \DateTime $dateCancelled
     * @return StatusHistory
     */
    public function setDateCancelled($dateCancelled)
    {
        $this->dateCancelled = $dateCancelled;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateDelivered()
    {
        return $this->dateDelivered;
    }

    /**
     * @param \DateTime $dateDelivered
     * @return StatusHistory
     */
    public function setDateDelivered($dateDelivered)
    {
        $this->dateDelivered = $dateDelivered;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateFirstVisit()
    {
        return $this->dateFirstVisit;
    }

    /**
     * @param \DateTime $dateFirstVisit
     * @return StatusHistory
     */
    public function setDateFirstVisit($dateFirstVisit)
    {
        $this->dateFirstVisit = $dateFirstVisit;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateHandling()
    {
        return $this->dateHandling;
    }

    /**
     * @param \DateTime $dateHandling
     * @return StatusHistory
     */
    public function setDateHandling($dateHandling)
    {
        $this->dateHandling = $dateHandling;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateNotDelivered()
    {
        return $this->dateNotDelivered;
    }

    /**
     * @param \DateTime $dateNotDelivered
     * @return StatusHistory
     */
    public function setDateNotDelivered($dateNotDelivered)
    {
        $this->dateNotDelivered = $dateNotDelivered;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateReadyToShip()
    {
        return $this->dateReadyToShip;
    }

    /**
     * @param \DateTime $dateReadyToShip
     * @return StatusHistory
     */
    public function setDateReadyToShip($dateReadyToShip)
    {
        $this->dateReadyToShip = $dateReadyToShip;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateShipped()
    {
        return $this->dateShipped;
    }

    /**
     * @param \DateTime $dateShipped
     * @return StatusHistory
     */
    public function setDateShipped($dateShipped)
    {
        $this->dateShipped = $dateShipped;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateReturned()
    {
        return $this->dateReturned;
    }

    /**
     * @param \DateTime $dateReturned
     * @return StatusHistory
     */
    public function setDateReturned($dateReturned)
    {
        $this->dateReturned = $dateReturned;
        return $this;
    }
}
