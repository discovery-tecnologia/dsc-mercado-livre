<?php
/**
 * Class Shipment
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Resources\Shipment;

use Dsc\MercadoLivre\Resources\Shipment\Option\Option;
use Dsc\MercadoLivre\Resources\Shipping\PersonAddress;
use JMS\Serializer\Annotation as JMS;

class Shipment
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
    private $mode;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $createdBy;

    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $orderId;

    /**
     * @var double
     * @JMS\Type("double")
     */
    private $orderCost;

    /**
     * @var double
     * @JMS\Type("double")
     */
    private $baseCost;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $siteId;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $status;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $substatus;

    /**
     * @var StatusHistory
     * @JMS\Type("Dsc\MercadoLivre\Resources\Shipment\StatusHistory")
     */
    private $statusHistory;

    /**
     * @var \DateTime
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s.u-04:00'>")
     */
    private $dateCreated;

    /**
     * @var \DateTime
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s.u-04:00'>")
     */
    private $lastUpdated;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $trackingNumber;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $trackingMethod;

    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $serviceId;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $carrierInfo;

    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $senderId;

    /**
     * @var PersonAddress
     * @JMS\Type("Dsc\MercadoLivre\Resources\Shipment\PersonAddress")
     */
    private $senderAddress;

    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $receiverId;

    /**
     * @var PersonAddress
     * @JMS\Type("Dsc\MercadoLivre\Resources\Shipment\PersonAddress")
     */
    private $receiverAddress;

    /**
     * @var Option
     * @JMS\SerializedName("shipping_option")
     * @JMS\Type("Dsc\MercadoLivre\Resources\Shipment\Option\Option")
     */
    private $option;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $comments;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $dateFirstPrinted;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $marketPlace;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $returnDetails;

    /**
     * @var array
     * @JMS\Type("array")
     */
    private $tags;

    /**
     * @var array
     * @JMS\Type("array")
     */
    private $delay;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $type;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $logisticType;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $applicationId;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $returnTrackingNumber;

    /**
     * @var CostComponents
     * @JMS\Type("Dsc\MercadoLivre\Resources\Shipment\CostComponents")
     */
    private $costComponents;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Shipment
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * @param string $mode
     * @return Shipment
     */
    public function setMode($mode)
    {
        $this->mode = $mode;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * @param string $createdBy
     * @return Shipment
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;
        return $this;
    }

    /**
     * @return int
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * @param int $orderId
     * @return Shipment
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
        return $this;
    }

    /**
     * @return float
     */
    public function getOrderCost()
    {
        return $this->orderCost;
    }

    /**
     * @param float $orderCost
     * @return Shipment
     */
    public function setOrderCost($orderCost)
    {
        $this->orderCost = $orderCost;
        return $this;
    }

    /**
     * @return float
     */
    public function getBaseCost()
    {
        return $this->baseCost;
    }

    /**
     * @param float $baseCost
     * @return Shipment
     */
    public function setBaseCost($baseCost)
    {
        $this->baseCost = $baseCost;
        return $this;
    }

    /**
     * @return string
     */
    public function getSiteId()
    {
        return $this->siteId;
    }

    /**
     * @param string $siteId
     * @return Shipment
     */
    public function setSiteId($siteId)
    {
        $this->siteId = $siteId;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return Shipment
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string
     */
    public function getSubstatus()
    {
        return $this->substatus;
    }

    /**
     * @param string $substatus
     * @return Shipment
     */
    public function setSubstatus($substatus)
    {
        $this->substatus = $substatus;
        return $this;
    }

    /**
     * @return StatusHistory
     */
    public function getStatusHistory()
    {
        return $this->statusHistory;
    }

    /**
     * @param StatusHistory $statusHistory
     * @return Shipment
     */
    public function setStatusHistory($statusHistory)
    {
        $this->statusHistory = $statusHistory;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * @param \DateTime $dateCreated
     * @return Shipment
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getLastUpdated()
    {
        return $this->lastUpdated;
    }

    /**
     * @param \DateTime $lastUpdated
     * @return Shipment
     */
    public function setLastUpdated($lastUpdated)
    {
        $this->lastUpdated = $lastUpdated;
        return $this;
    }

    /**
     * @return string
     */
    public function getTrackingNumber()
    {
        return $this->trackingNumber;
    }

    /**
     * @param string $trackingNumber
     * @return Shipment
     */
    public function setTrackingNumber($trackingNumber)
    {
        $this->trackingNumber = $trackingNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getTrackingMethod()
    {
        return $this->trackingMethod;
    }

    /**
     * @param string $trackingMethod
     * @return Shipment
     */
    public function setTrackingMethod($trackingMethod)
    {
        $this->trackingMethod = $trackingMethod;
        return $this;
    }

    /**
     * @return int
     */
    public function getServiceId()
    {
        return $this->serviceId;
    }

    /**
     * @param int $serviceId
     * @return Shipment
     */
    public function setServiceId($serviceId)
    {
        $this->serviceId = $serviceId;
        return $this;
    }

    /**
     * @return string
     */
    public function getCarrierInfo()
    {
        return $this->carrierInfo;
    }

    /**
     * @param string $carrierInfo
     * @return Shipment
     */
    public function setCarrierInfo($carrierInfo)
    {
        $this->carrierInfo = $carrierInfo;
        return $this;
    }

    /**
     * @return int
     */
    public function getSenderId()
    {
        return $this->senderId;
    }

    /**
     * @param int $senderId
     * @return Shipment
     */
    public function setSenderId($senderId)
    {
        $this->senderId = $senderId;
        return $this;
    }

    /**
     * @return PersonAddress
     */
    public function getSenderAddress()
    {
        return $this->senderAddress;
    }

    /**
     * @param PersonAddress $senderAddress
     * @return Shipment
     */
    public function setSenderAddress($senderAddress)
    {
        $this->senderAddress = $senderAddress;
        return $this;
    }

    /**
     * @return int
     */
    public function getReceiverId()
    {
        return $this->receiverId;
    }

    /**
     * @param int $receiverId
     * @return Shipment
     */
    public function setReceiverId($receiverId)
    {
        $this->receiverId = $receiverId;
        return $this;
    }

    /**
     * @return PersonAddress
     */
    public function getReceiverAddress()
    {
        return $this->receiverAddress;
    }

    /**
     * @param PersonAddress $receiverAddress
     * @return Shipment
     */
    public function setReceiverAddress($receiverAddress)
    {
        $this->receiverAddress = $receiverAddress;
        return $this;
    }

    /**
     * @return Option
     */
    public function getOption()
    {
        return $this->option;
    }

    /**
     * @param Option $option
     * @return Shipment
     */
    public function setOption($option)
    {
        $this->option = $option;
        return $this;
    }

    /**
     * @return string
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param string $comments
     * @return Shipment
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
        return $this;
    }

    /**
     * @return string
     */
    public function getDateFirstPrinted()
    {
        return $this->dateFirstPrinted;
    }

    /**
     * @param string $dateFirstPrinted
     * @return Shipment
     */
    public function setDateFirstPrinted($dateFirstPrinted)
    {
        $this->dateFirstPrinted = $dateFirstPrinted;
        return $this;
    }

    /**
     * @return string
     */
    public function getMarketPlace()
    {
        return $this->marketPlace;
    }

    /**
     * @param string $marketPlace
     * @return Shipment
     */
    public function setMarketPlace($marketPlace)
    {
        $this->marketPlace = $marketPlace;
        return $this;
    }

    /**
     * @return string
     */
    public function getReturnDetails()
    {
        return $this->returnDetails;
    }

    /**
     * @param string $returnDetails
     * @return Shipment
     */
    public function setReturnDetails($returnDetails)
    {
        $this->returnDetails = $returnDetails;
        return $this;
    }

    /**
     * @return array
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param array $tags
     * @return Shipment
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
        return $this;
    }

    /**
     * @return array
     */
    public function getDelay()
    {
        return $this->delay;
    }

    /**
     * @param array $delay
     * @return Shipment
     */
    public function setDelay($delay)
    {
        $this->delay = $delay;
        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Shipment
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getLogisticType()
    {
        return $this->logisticType;
    }

    /**
     * @param string $logisticType
     * @return Shipment
     */
    public function setLogisticType($logisticType)
    {
        $this->logisticType = $logisticType;
        return $this;
    }

    /**
     * @return string
     */
    public function getApplicationId()
    {
        return $this->applicationId;
    }

    /**
     * @param string $applicationId
     * @return Shipment
     */
    public function setApplicationId($applicationId)
    {
        $this->applicationId = $applicationId;
        return $this;
    }

    /**
     * @return string
     */
    public function getReturnTrackingNumber()
    {
        return $this->returnTrackingNumber;
    }

    /**
     * @param string $returnTrackingNumber
     * @return Shipment
     */
    public function setReturnTrackingNumber($returnTrackingNumber)
    {
        $this->returnTrackingNumber = $returnTrackingNumber;
        return $this;
    }

    /**
     * @return CostComponents
     */
    public function getCostComponents()
    {
        return $this->costComponents;
    }

    /**
     * @param CostComponents $costComponents
     * @return Shipment
     */
    public function setCostComponents($costComponents)
    {
        $this->costComponents = $costComponents;
        return $this;
    }
}
