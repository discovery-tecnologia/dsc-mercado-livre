<?php
/**
 * Class Settings
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Category;

use JMS\Serializer\Annotation as JMS;

class Settings
{
    /**
     * @var boolean
     * @JMS\Type("boolean")
     */
    private $adultContent;

    /**
     * @var boolean
     * @JMS\Type("boolean")
     */
    private $buyingAllowed;

    /**
     * @var array
     * @JMS\Type("array")
     */
    private $buyingModes;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $coverageAreas;

    /**
     * @var array
     * @JMS\Type("array")
     */
    private $currencies;

    /**
     * @var boolean
     * @JMS\Type("boolean")
     */
    private $fragile;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $immediatePayment;

    /**
     * @var array
     * @JMS\Type("array")
     */
    private $itemConditions;

    /**
     * @var boolean
     * @JMS\Type("boolean")
     */
    private $itemsReviewsAllowed;

    /**
     * @var boolean
     * @JMS\Type("boolean")
     */
    private $listingAllowed;

    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $maxDescriptionLength;

    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $maxPicturesPerItem;

    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $maxPicturesPerItemVar;

    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $maxSubTitleLength;

    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $maxTitleLength;

    /**
     * @var double
     * @JMS\Type("double")
     */
    private $maximumPrice;

    /**
     * @var double
     * @JMS\Type("double")
     */
    private $minimumPrice;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $mirrorCategory;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $mirrorMasterCategory;

    /**
     * @var array
     * @JMS\Type("array")
     */
    private $mirrorSlaveCategories;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $price;

    /**
     * @var array
     * @JMS\Type("array")
     */
    private $restrictions;

    /**
     * @var boolean
     * @JMS\Type("boolean")
     */
    private $roundedAddress;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $sellerContact;

    /**
     * @var array
     * @JMS\Type("array")
     */
    private $shippingModes;

    /**
     * @var array
     * @JMS\Type("array")
     */
    private $shippingOptions;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $shippingProfile;

    /**
     * @var boolean
     * @JMS\Type("boolean")
     */
    private $showContactInformation;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $simpleShipping;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $stock;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $subVertical;

    /**
     * @var array
     * @JMS\Type("array")
     */
    private $tags;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $vertical;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $vipSubdomain;

    /**
     * @return boolean
     */
    public function isAdultContent()
    {
        return $this->adultContent;
    }

    /**
     * @param boolean $adultContent
     * @return Settings
     */
    public function setAdultContent($adultContent)
    {
        $this->adultContent = $adultContent;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isBuyingAllowed()
    {
        return $this->buyingAllowed;
    }

    /**
     * @param boolean $buyingAllowed
     * @return Settings
     */
    public function setBuyingAllowed($buyingAllowed)
    {
        $this->buyingAllowed = $buyingAllowed;
        return $this;
    }

    /**
     * @return array
     */
    public function getBuyingModes()
    {
        return $this->buyingModes;
    }

    /**
     * @param array $buyingModes
     * @return Settings
     */
    public function setBuyingModes($buyingModes)
    {
        $this->buyingModes = $buyingModes;
        return $this;
    }

    /**
     * @return string
     */
    public function getCoverageAreas()
    {
        return $this->coverageAreas;
    }

    /**
     * @param string $coverageAreas
     * @return Settings
     */
    public function setCoverageAreas($coverageAreas)
    {
        $this->coverageAreas = $coverageAreas;
        return $this;
    }

    /**
     * @return array
     */
    public function getCurrencies()
    {
        return $this->currencies;
    }

    /**
     * @param array $currencies
     * @return Settings
     */
    public function setCurrencies($currencies)
    {
        $this->currencies = $currencies;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isFragile()
    {
        return $this->fragile;
    }

    /**
     * @param boolean $fragile
     * @return Settings
     */
    public function setFragile($fragile)
    {
        $this->fragile = $fragile;
        return $this;
    }

    /**
     * @return string
     */
    public function getImmediatePayment()
    {
        return $this->immediatePayment;
    }

    /**
     * @param string $immediatePayment
     * @return Settings
     */
    public function setImmediatePayment($immediatePayment)
    {
        $this->immediatePayment = $immediatePayment;
        return $this;
    }

    /**
     * @return array
     */
    public function getItemConditions()
    {
        return $this->itemConditions;
    }

    /**
     * @param array $itemConditions
     * @return Settings
     */
    public function setItemConditions($itemConditions)
    {
        $this->itemConditions = $itemConditions;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isItemsReviewsAllowed()
    {
        return $this->itemsReviewsAllowed;
    }

    /**
     * @param boolean $itemsReviewsAllowed
     * @return Settings
     */
    public function setItemsReviewsAllowed($itemsReviewsAllowed)
    {
        $this->itemsReviewsAllowed = $itemsReviewsAllowed;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isListingAllowed()
    {
        return $this->listingAllowed;
    }

    /**
     * @param boolean $listingAllowed
     * @return Settings
     */
    public function setListingAllowed($listingAllowed)
    {
        $this->listingAllowed = $listingAllowed;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxDescriptionLength()
    {
        return $this->maxDescriptionLength;
    }

    /**
     * @param int $maxDescriptionLength
     * @return Settings
     */
    public function setMaxDescriptionLength($maxDescriptionLength)
    {
        $this->maxDescriptionLength = $maxDescriptionLength;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxPicturesPerItem()
    {
        return $this->maxPicturesPerItem;
    }

    /**
     * @param int $maxPicturesPerItem
     * @return Settings
     */
    public function setMaxPicturesPerItem($maxPicturesPerItem)
    {
        $this->maxPicturesPerItem = $maxPicturesPerItem;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxPicturesPerItemVar()
    {
        return $this->maxPicturesPerItemVar;
    }

    /**
     * @param int $maxPicturesPerItemVar
     * @return Settings
     */
    public function setMaxPicturesPerItemVar($maxPicturesPerItemVar)
    {
        $this->maxPicturesPerItemVar = $maxPicturesPerItemVar;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxSubTitleLength()
    {
        return $this->maxSubTitleLength;
    }

    /**
     * @param int $maxSubTitleLength
     * @return Settings
     */
    public function setMaxSubTitleLength($maxSubTitleLength)
    {
        $this->maxSubTitleLength = $maxSubTitleLength;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxTitleLength()
    {
        return $this->maxTitleLength;
    }

    /**
     * @param int $maxTitleLength
     * @return Settings
     */
    public function setMaxTitleLength($maxTitleLength)
    {
        $this->maxTitleLength = $maxTitleLength;
        return $this;
    }

    /**
     * @return float
     */
    public function getMaximumPrice()
    {
        return $this->maximumPrice;
    }

    /**
     * @param float $maximumPrice
     * @return Settings
     */
    public function setMaximumPrice($maximumPrice)
    {
        $this->maximumPrice = $maximumPrice;
        return $this;
    }

    /**
     * @return float
     */
    public function getMinimumPrice()
    {
        return $this->minimumPrice;
    }

    /**
     * @param float $minimumPrice
     * @return Settings
     */
    public function setMinimumPrice($minimumPrice)
    {
        $this->minimumPrice = $minimumPrice;
        return $this;
    }

    /**
     * @return string
     */
    public function getMirrorCategory()
    {
        return $this->mirrorCategory;
    }

    /**
     * @param string $mirrorCategory
     * @return Settings
     */
    public function setMirrorCategory($mirrorCategory)
    {
        $this->mirrorCategory = $mirrorCategory;
        return $this;
    }

    /**
     * @return string
     */
    public function getMirrorMasterCategory()
    {
        return $this->mirrorMasterCategory;
    }

    /**
     * @param string $mirrorMasterCategory
     * @return Settings
     */
    public function setMirrorMasterCategory($mirrorMasterCategory)
    {
        $this->mirrorMasterCategory = $mirrorMasterCategory;
        return $this;
    }

    /**
     * @return array
     */
    public function getMirrorSlaveCategories()
    {
        return $this->mirrorSlaveCategories;
    }

    /**
     * @param array $mirrorSlaveCategories
     * @return Settings
     */
    public function setMirrorSlaveCategories($mirrorSlaveCategories)
    {
        $this->mirrorSlaveCategories = $mirrorSlaveCategories;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param string $price
     * @return Settings
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return array
     */
    public function getRestrictions()
    {
        return $this->restrictions;
    }

    /**
     * @param array $restrictions
     * @return Settings
     */
    public function setRestrictions($restrictions)
    {
        $this->restrictions = $restrictions;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isRoundedAddress()
    {
        return $this->roundedAddress;
    }

    /**
     * @param boolean $roundedAddress
     * @return Settings
     */
    public function setRoundedAddress($roundedAddress)
    {
        $this->roundedAddress = $roundedAddress;
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
     * @return Settings
     */
    public function setSellerContact($sellerContact)
    {
        $this->sellerContact = $sellerContact;
        return $this;
    }

    /**
     * @return array
     */
    public function getShippingModes()
    {
        return $this->shippingModes;
    }

    /**
     * @param array $shippingModes
     * @return Settings
     */
    public function setShippingModes($shippingModes)
    {
        $this->shippingModes = $shippingModes;
        return $this;
    }

    /**
     * @return array
     */
    public function getShippingOptions()
    {
        return $this->shippingOptions;
    }

    /**
     * @param array $shippingOptions
     * @return Settings
     */
    public function setShippingOptions($shippingOptions)
    {
        $this->shippingOptions = $shippingOptions;
        return $this;
    }

    /**
     * @return string
     */
    public function getShippingProfile()
    {
        return $this->shippingProfile;
    }

    /**
     * @param string $shippingProfile
     * @return Settings
     */
    public function setShippingProfile($shippingProfile)
    {
        $this->shippingProfile = $shippingProfile;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isShowContactInformation()
    {
        return $this->showContactInformation;
    }

    /**
     * @param boolean $showContactInformation
     * @return Settings
     */
    public function setShowContactInformation($showContactInformation)
    {
        $this->showContactInformation = $showContactInformation;
        return $this;
    }

    /**
     * @return string
     */
    public function getSimpleShipping()
    {
        return $this->simpleShipping;
    }

    /**
     * @param string $simpleShipping
     * @return Settings
     */
    public function setSimpleShipping($simpleShipping)
    {
        $this->simpleShipping = $simpleShipping;
        return $this;
    }

    /**
     * @return string
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * @param string $stock
     * @return Settings
     */
    public function setStock($stock)
    {
        $this->stock = $stock;
        return $this;
    }

    /**
     * @return string
     */
    public function getSubVertical()
    {
        return $this->subVertical;
    }

    /**
     * @param string $subVertical
     * @return Settings
     */
    public function setSubVertical($subVertical)
    {
        $this->subVertical = $subVertical;
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
     * @return Settings
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
        return $this;
    }

    /**
     * @return string
     */
    public function getVertical()
    {
        return $this->vertical;
    }

    /**
     * @param string $vertical
     * @return Settings
     */
    public function setVertical($vertical)
    {
        $this->vertical = $vertical;
        return $this;
    }

    /**
     * @return string
     */
    public function getVipSubdomain()
    {
        return $this->vipSubdomain;
    }

    /**
     * @param string $vipSubdomain
     * @return Settings
     */
    public function setVipSubdomain($vipSubdomain)
    {
        $this->vipSubdomain = $vipSubdomain;
        return $this;
    }
}