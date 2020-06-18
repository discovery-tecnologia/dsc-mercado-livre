<?php
/**
 * Class Order
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Resources\Order;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Dsc\MercadoLivre\Resources\Buyer\Buyer;
use Dsc\MercadoLivre\Resources\Feedback\Feedback;
use Dsc\MercadoLivre\Resources\Payment\Payment;
use Dsc\MercadoLivre\Resources\Seller\Seller;
use Dsc\MercadoLivre\Resources\Shipping\Shipping;
use JMS\Serializer\Annotation as JMS;

class Order
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
    private $comments;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $status;

    /**
     * @var StatusDetail
     * @JMS\Type("Dsc\MercadoLivre\Resources\Order\StatusDetail")
     */
    private $statusDetail;

    /**
     * @var \DateTime
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s.000-04:00'>")
     */
    private $dateCreated;

    /**
     * @var \DateTime
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s.000-04:00'>")
     */
    private $dateClosed;

    /**
     * @var \DateTime
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s.000-04:00'>")
     */
    private $expirationDate;

    /**
     * @var \DateTime
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s.u+'>")
     */
    private $dateLastUpdated;

    /**
     * @var boolean
     * @JMS\Type("boolean")
     */
    private $hiddenForSeller;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $currencyId;

    /**
     * @var Buyer
     * @JMS\Type("Dsc\MercadoLivre\Resources\Buyer\Buyer")
     */
    private $buyer;

    /**
     * @var Seller
     * @JMS\Type("Dsc\MercadoLivre\Resources\Seller\Seller")
     */
    private $seller;

    /**
     * @var ArrayCollection
     * @JMS\Type("ArrayCollection<Dsc\MercadoLivre\Resources\Order\OrderItem>")
     */
    private $orderItems;

    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $totalAmount;

    /**
     * @var array
     * @JMS\Type("array")
     */
    private $mediations;

    /**
     * @var ArrayCollection
     * @JMS\Type("ArrayCollection<Dsc\MercadoLivre\Resources\Payment\Payment>")
     */
    private $payments;

    /**
     * @var Feedback
     * @JMS\Type("Dsc\MercadoLivre\Resources\Feedback\Feedback")
     */
    private $feedback;

    /**
     * @var Shipping
     * @JMS\Type("Dsc\MercadoLivre\Resources\Shipping\Shipping")
     */
    private $shipping;

    /**
     * @var array
     * @JMS\Type("array")
     */
    private $tags;

    /**
     * Order constructor.
     */
    public function __construct()
    {
        $this->orderItems = new ArrayCollection();
        $this->payments   = new ArrayCollection();
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
     * @return Order
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @return Order
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
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
     * @return Order
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return StatusDetail
     */
    public function getStatusDetail()
    {
        return $this->statusDetail;
    }

    /**
     * @param StatusDetail $statusDetail
     * @return Order
     */
    public function setStatusDetail(StatusDetail $statusDetail)
    {
        $this->statusDetail = $statusDetail;
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
     * @return Order
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateClosed()
    {
        return $this->dateClosed;
    }

    /**
     * @param \DateTime $dateClosed
     * @return Order
     */
    public function setDateClosed($dateClosed)
    {
        $this->dateClosed = $dateClosed;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getExpirationDate()
    {
        return $this->expirationDate;
    }

    /**
     * @param \DateTime $expirationDate
     * @return Order
     */
    public function setExpirationDate($expirationDate)
    {
        $this->expirationDate = $expirationDate;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateLastUpdated()
    {
        return $this->dateLastUpdated;
    }

    /**
     * @param \DateTime $dateLastUpdated
     * @return Order
     */
    public function setDateLastUpdated($dateLastUpdated)
    {
        $this->dateLastUpdated = $dateLastUpdated;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isHiddenForSeller()
    {
        return $this->hiddenForSeller;
    }

    /**
     * @param boolean $hiddenForSeller
     * @return Order
     */
    public function setHiddenForSeller($hiddenForSeller)
    {
        $this->hiddenForSeller = $hiddenForSeller;
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
     * @return Order
     */
    public function setCurrencyId($currencyId)
    {
        $this->currencyId = $currencyId;
        return $this;
    }

    /**
     * @return Buyer
     */
    public function getBuyer()
    {
        return $this->buyer;
    }

    /**
     * @param Buyer $buyer
     * @return Order
     */
    public function setBuyer(Buyer $buyer)
    {
        $this->buyer = $buyer;
        return $this;
    }

    /**
     * @return Seller
     */
    public function getSeller()
    {
        return $this->seller;
    }

    /**
     * @param Seller $seller
     * @return Order
     */
    public function setSeller(Seller $seller)
    {
        $this->seller = $seller;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getOrderItems()
    {
        return $this->orderItems;
    }

    /**
     * @param OrderItem $orderItem
     * @return Order
     */
    public function addOrderItem(OrderItem $orderItem)
    {
        $this->orderItems->add($orderItem);
        return $this;
    }

    /**
     * @param $key
     * @return Order
     */
    public function removeOrderItem($key)
    {
        $this->orderItems->remove($key);
        return $this;
    }

    /**
     * @param ArrayCollection $orderItems
     * @return Order
     */
    public function setOrderItems(Collection $orderItems)
    {
        $this->orderItems = $orderItems;
        return $this;
    }

    /**
     * @return int
     */
    public function getTotalAmount()
    {
        return $this->totalAmount;
    }

    /**
     * @param int $totalAmount
     * @return Order
     */
    public function setTotalAmount($totalAmount)
    {
        $this->totalAmount = $totalAmount;
        return $this;
    }

    /**
     * @return array
     */
    public function getMediations()
    {
        return $this->mediations;
    }

    /**
     * @param array $mediations
     * @return Order
     */
    public function setMediations($mediations)
    {
        $this->mediations = $mediations;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getPayments()
    {
        return $this->payments;
    }

    /**
     * @param Payment $payment
     * @return Order
     */
    public function addPayment(Payment $payment)
    {
        $this->payments->add($payment);
        return $this;
    }

    /**
     * @param $key
     * @return Order
     */
    public function removePayment($key)
    {
        $this->payments->remove($key);
        return $this;
    }

    /**
     * @param ArrayCollection $payments
     * @return Order
     */
    public function setPayments(Collection $payments)
    {
        $this->payments = $payments;
        return $this;
    }

    /**
     * @return Feedback
     */
    public function getFeedback()
    {
        return $this->feedback;
    }

    /**
     * @param Feedback $feedback
     * @return Order
     */
    public function setFeedback(Feedback $feedback)
    {
        $this->feedback = $feedback;
        return $this;
    }

    /**
     * @return Shipping
     */
    public function getShipping()
    {
        return $this->shipping;
    }

    /**
     * @param Shipping $shipping
     * @return Order
     */
    public function setShipping(Shipping $shipping)
    {
        $this->shipping = $shipping;
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
     * @return Order
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
        return $this;
    }
}