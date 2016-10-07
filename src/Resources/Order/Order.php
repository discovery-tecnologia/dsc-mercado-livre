<?php
/**
 * Class Order
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Resources\Order;

use Doctrine\Common\Collections\ArrayCollection;
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
     * @var string
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
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s.457Z'>")
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
     * @var Shipping
     * @JMS\Type("Dsc\MercadoLivre\Resources\Order\Shipping")
     */
    private $shipping;

    /**
     * Order constructor.
     */
    public function __construct()
    {
        $this->orderItems = new ArrayCollection();
        $this->payments   = new ArrayCollection();
    }
}