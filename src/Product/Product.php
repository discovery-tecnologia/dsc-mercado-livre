<?php
/**
 * Class Product
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Product;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as JMS;

class Product
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
    private $siteId;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $title;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $subtitle;

    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $sellerId;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $categoryId;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $officialStoreId;

    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $price;

    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $basePrice;

    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $originalPrice;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $currencyId;

    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $initialQuantity;

    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $availableQuantity;

    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $soldQuantity;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $buyingMode;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $listingTypeId;

    /**
     * @var \DateTime
     * @JMS\Type("DateTime")
     */
    private $startTime;

    /**
     * @var \DateTime
     * @JMS\Type("DateTime")
     */
    private $stopTime;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $condition;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $permalink;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $thumbnail;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $secureThumbnail;

    /**
     * @var ArrayCollection
     * @JMS\Type("ArrayCollection<Dsc\MercadoLivre\Product\Picture>")
     */
    private $pictures;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $videoId;

    /**
     * @var ArrayCollection
     * @JMS\Type("ArrayCollection<Dsc\MercadoLivre\Product\Description>")
     */
    private $descriptions;

    /**
     * @var boolean
     * @JMS\Type("boolean")
     */
    private $acceptsMercadopago;

    /**
     * @var array
     * @JMS\Type("array")
     */
    private $nonMercadoPagoPaymentMethods;

    /**
     * @var Shipping
     * @JMS\Type("Dsc\MercadoLivre\Product\Shipping")
     */
    private $shipping;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $internationalDeliveryMode;
}