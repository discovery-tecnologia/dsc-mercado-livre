<?php
/**
 * Class Product
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Requests\Product;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s.u\Z'>")
     */
    private $startTime;

    /**
     * @var \DateTime
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s.u\Z'>")
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
     * @JMS\Type("ArrayCollection<Dsc\MercadoLivre\Requests\Product\Picture>")
     */
    private $pictures;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $description;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $videoId;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $warranty;

    /**
     * @var ArrayCollection
     * @JMS\Type("ArrayCollection<Dsc\MercadoLivre\Requests\Product\Description>")
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
     * @JMS\Type("Dsc\MercadoLivre\Requests\Product\Shipping")
     */
    private $shipping;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $internationalDeliveryMode;

    /**
     * @var Shipping
     * @JMS\Type("Dsc\MercadoLivre\Requests\Product\SellerAddress")
     */
    private $sellerAddress;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $sellerContact;

    /**
     * @var Geolocation
     * @JMS\Type("Dsc\MercadoLivre\Requests\Product\Geolocation")
     */
    private $geolocation;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $status;

    /**
     * @var string
     * @JMS\Type("array")
     */
    private $subStatus;

    /**
     * @var \DateTime
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s.u\Z'>")
     */
    private $dateCreated;

    /**
     * @var \DateTime
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s.u\Z'>")
     */
    private $lastUpdated;

    /**
     * @var array
     * @JMS\Type("array")
     */
    private $tags;

    /**
     * @var ArrayCollection
     * @JMS\Type("ArrayCollection<Dsc\MercadoLivre\Requests\Product\Variation>")
     */
    private $variations;

    //TODO mapping others fields    

    /**
     * Product constructor.
     */
    public function __construct()
    {
        $this->pictures = new ArrayCollection();
        $this->variations = new ArrayCollection();
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
     * @return Product
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @return Product
     */
    public function setSiteId($siteId)
    {
        $this->siteId = $siteId;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Product
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * @param string $subtitle
     * @return Product
     */
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;
        return $this;
    }

    /**
     * @return int
     */
    public function getSellerId()
    {
        return $this->sellerId;
    }

    /**
     * @param int $sellerId
     * @return Product
     */
    public function setSellerId($sellerId)
    {
        $this->sellerId = $sellerId;
        return $this;
    }

    /**
     * @return string
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * @param string $categoryId
     * @return Product
     */
    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;
        return $this;
    }

    /**
     * @return string
     */
    public function getOfficialStoreId()
    {
        return $this->officialStoreId;
    }

    /**
     * @param string $officialStoreId
     * @return Product
     */
    public function setOfficialStoreId($officialStoreId)
    {
        $this->officialStoreId = $officialStoreId;
        return $this;
    }

    /**
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param int $price
     * @return Product
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return int
     */
    public function getBasePrice()
    {
        return $this->basePrice;
    }

    /**
     * @param int $basePrice
     * @return Product
     */
    public function setBasePrice($basePrice)
    {
        $this->basePrice = $basePrice;
        return $this;
    }

    /**
     * @return int
     */
    public function getOriginalPrice()
    {
        return $this->originalPrice;
    }

    /**
     * @param int $originalPrice
     * @return Product
     */
    public function setOriginalPrice($originalPrice)
    {
        $this->originalPrice = $originalPrice;
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
     * @return Product
     */
    public function setCurrencyId($currencyId)
    {
        $this->currencyId = $currencyId;
        return $this;
    }

    /**
     * @return int
     */
    public function getInitialQuantity()
    {
        return $this->initialQuantity;
    }

    /**
     * @param int $initialQuantity
     * @return Product
     */
    public function setInitialQuantity($initialQuantity)
    {
        $this->initialQuantity = $initialQuantity;
        return $this;
    }

    /**
     * @return int
     */
    public function getAvailableQuantity()
    {
        return $this->availableQuantity;
    }

    /**
     * @param int $availableQuantity
     * @return Product
     */
    public function setAvailableQuantity($availableQuantity)
    {
        $this->availableQuantity = $availableQuantity;
        return $this;
    }

    /**
     * @return int
     */
    public function getSoldQuantity()
    {
        return $this->soldQuantity;
    }

    /**
     * @param int $soldQuantity
     * @return Product
     */
    public function setSoldQuantity($soldQuantity)
    {
        $this->soldQuantity = $soldQuantity;
        return $this;
    }

    /**
     * @return string
     */
    public function getBuyingMode()
    {
        return $this->buyingMode;
    }

    /**
     * @param string $buyingMode
     * @return Product
     */
    public function setBuyingMode($buyingMode)
    {
        $this->buyingMode = $buyingMode;
        return $this;
    }

    /**
     * @return string
     */
    public function getListingTypeId()
    {
        return $this->listingTypeId;
    }

    /**
     * @param string $listingTypeId
     * @return Product
     */
    public function setListingTypeId($listingTypeId)
    {
        $this->listingTypeId = $listingTypeId;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * @param \DateTime $startTime
     * @return Product
     */
    public function setStartTime($startTime)
    {
        $this->startTime = $startTime;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getStopTime()
    {
        return $this->stopTime;
    }

    /**
     * @param \DateTime $stopTime
     * @return Product
     */
    public function setStopTime($stopTime)
    {
        $this->stopTime = $stopTime;
        return $this;
    }

    /**
     * @return string
     */
    public function getCondition()
    {
        return $this->condition;
    }

    /**
     * @param string $condition
     * @return Product
     */
    public function setCondition($condition)
    {
        $this->condition = $condition;
        return $this;
    }

    /**
     * @return string
     */
    public function getPermalink()
    {
        return $this->permalink;
    }

    /**
     * @param string $permalink
     * @return Product
     */
    public function setPermalink($permalink)
    {
        $this->permalink = $permalink;
        return $this;
    }

    /**
     * @return string
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    /**
     * @param string $thumbnail
     * @return Product
     */
    public function setThumbnail($thumbnail)
    {
        $this->thumbnail = $thumbnail;
        return $this;
    }

    /**
     * @return string
     */
    public function getSecureThumbnail()
    {
        return $this->secureThumbnail;
    }

    /**
     * @param string $secureThumbnail
     * @return Product
     */
    public function setSecureThumbnail($secureThumbnail)
    {
        $this->secureThumbnail = $secureThumbnail;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getPictures()
    {
        return $this->pictures;
    }

    /**
     * @param Picture $picture
     * @return Product
     */
    public function addPicture(Picture $picture)
    {
        $this->pictures->add($picture);
        return $this;
    }

    /**
     * @param Picture $picture
     */
    public function removePicture(Picture $picture)
    {
        $this->pictures->remove($picture);
    }

    /**
     * @param Collection $pictures
     * @return Product
     */
    public function setPictures(Collection $pictures)
    {
        $this->pictures = $pictures;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Product
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getVideoId()
    {
        return $this->videoId;
    }

    /**
     * @param string $videoId
     * @return Product
     */
    public function setVideoId($videoId)
    {
        $this->videoId = $videoId;
        return $this;
    }

    /**
     * @return string
     */
    public function getWarranty()
    {
        return $this->warranty;
    }

    /**
     * @param string $warranty
     * @return Product
     */
    public function setWarranty($warranty)
    {
        $this->warranty = $warranty;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getDescriptions()
    {
        return $this->descriptions;
    }

    /**
     * @param Description $description
     * @return Product
     */
    public function addDescription(Description $description)
    {
        $this->descriptions->add($description);
        return $this;
    }

    /**
     * @param Description $description
     */
    public function removeDescription(Description $description)
    {
        $this->pictures->remove($description);
    }

    /**
     * @param Collection $descriptions
     * @return Product
     */
    public function setDescriptions(Collection $descriptions)
    {
        $this->descriptions = $descriptions;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isAcceptsMercadopago()
    {
        return $this->acceptsMercadopago;
    }

    /**
     * @param boolean $acceptsMercadopago
     * @return Product
     */
    public function setAcceptsMercadopago($acceptsMercadopago)
    {
        $this->acceptsMercadopago = $acceptsMercadopago;
        return $this;
    }

    /**
     * @return array
     */
    public function getNonMercadoPagoPaymentMethods()
    {
        return $this->nonMercadoPagoPaymentMethods;
    }

    /**
     * @param array $nonMercadoPagoPaymentMethods
     * @return Product
     */
    public function setNonMercadoPagoPaymentMethods($nonMercadoPagoPaymentMethods)
    {
        $this->nonMercadoPagoPaymentMethods = $nonMercadoPagoPaymentMethods;
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
     * @return Product
     */
    public function setShipping($shipping)
    {
        $this->shipping = $shipping;
        return $this;
    }

    /**
     * @return string
     */
    public function getInternationalDeliveryMode()
    {
        return $this->internationalDeliveryMode;
    }

    /**
     * @param string $internationalDeliveryMode
     * @return Product
     */
    public function setInternationalDeliveryMode($internationalDeliveryMode)
    {
        $this->internationalDeliveryMode = $internationalDeliveryMode;
        return $this;
    }

    /**
     * @return Shipping
     */
    public function getSellerAddress()
    {
        return $this->sellerAddress;
    }

    /**
     * @param Shipping $sellerAddress
     * @return Product
     */
    public function setSellerAddress(Shipping $sellerAddress)
    {
        $this->sellerAddress = $sellerAddress;
        return $this;
    }

    /**
     * @return string
     */
    public function getSellerContact()
    {
        return $this->sellerContact;
    }

    /**
     * @param string $sellerContact
     * @return Product
     */
    public function setSellerContact($sellerContact)
    {
        $this->sellerContact = $sellerContact;
        return $this;
    }

    /**
     * @return Geolocation
     */
    public function getGeolocation()
    {
        return $this->geolocation;
    }

    /**
     * @param Geolocation $geolocation
     * @return Product
     */
    public function setGeolocation(Geolocation $geolocation)
    {
        $this->geolocation = $geolocation;
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
     * @return Product
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return array
     */
    public function getSubStatus()
    {
        return $this->subStatus;
    }

    /**
     * @param string $subStatus
     * @return Product
     */
    public function setSubStatus($subStatus)
    {
        $this->subStatus = $subStatus;
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
     * @return Product
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
     * @return Product
     */
    public function setLastUpdated($lastUpdated)
    {
        $this->lastUpdated = $lastUpdated;
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
     * @return Product
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getVariations()
    {
        return $this->variations;
    }

    /**
     * @param Variation $value
     */
    public function addVariation(Variation $value)
    {
        $this->variations->add($value);
    }

    /**
     * @param Variation $value
     */
    public function removeVariation(Variation $value)
    {
        $this->variations->remove($value);
    }

    /**
     * @param ArrayCollection $values
     * @return Item
     */
    public function setVariations(Collection $values)
    {
        $this->variations = $values;
        return $this;
    }
}
