<?php
/**
 * Class Item
 * Classe para publicação de anúncios - Produto - Imóvies - Serviços - Veículos
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Announcement;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use JMS\Serializer\Annotation as JMS;
use Dsc\MercadoLivre\Requests\Product\Variation;
use Dsc\MercadoLivre\Requests\Category\Attribute;

class Item implements Announcement
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
    private $title;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $categoryId;

    /**
     * @var double
     * @JMS\Type("double")
     */
    private $price;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $currencyId;

    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $availableQuantity;

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
     * @var string
     * @JMS\Type("string")
     */
    private $condition;

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
     * @var array
     * @JMS\Type("array")
     */
    private $tags;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $warranty;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $status;

    /**
     * @var ArrayCollection
     * @JMS\Type("ArrayCollection<Dsc\MercadoLivre\Announcement\Picture>")
     */
    private $pictures;

    /**
     * @var ArrayCollection
     * @JMS\Type("ArrayCollection<Dsc\MercadoLivre\Requests\Category\Attribute>")
     */
    private $attributes;

    /**
     * @var ArrayCollection
     * @JMS\Type("ArrayCollection<Dsc\MercadoLivre\Requests\Product\Variation>")
     */
    private $variations;

    /**
     * Announcement constructor.
     */
    public function __construct()
    {
        $this->pictures   = new ArrayCollection();
        $this->attributes = new ArrayCollection();
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
     * @return Item
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @return Announcement
     */
    public function setTitle($title)
    {
        $this->title = $title;
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
     * @return Announcement
     */
    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;
        return $this;
    }

    /**
     * @return double
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param double $price
     * @return Announcement
     */
    public function setPrice($price)
    {
        $this->price = $price;
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
     * @return Announcement
     */
    public function setCurrencyId($currencyId)
    {
        $this->currencyId = $currencyId;
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
     * @return Announcement
     */
    public function setAvailableQuantity($availableQuantity)
    {
        $this->availableQuantity = $availableQuantity;
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
     * @return Announcement
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
     * @return Announcement
     */
    public function setListingTypeId($listingTypeId)
    {
        $this->listingTypeId = $listingTypeId;
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
     * @return Announcement
     */
    public function setCondition($condition)
    {
        $this->condition = $condition;
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
     * @return Announcement
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
     * @return Announcement
     */
    public function setVideoId($videoId)
    {
        $this->videoId = $videoId;
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
     * @return Announcement
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
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
     * @return Announcement
     */
    public function setWarranty($warranty)
    {
        $this->warranty = $warranty;
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
     */
    public function setStatus($status)
    {
        $this->status = $status;
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
     */
    public function addPicture(Picture $picture)
    {
        $this->pictures->add($picture);
    }

    /**
     * @param Picture $picture
     */
    public function removePicture(Picture $picture)
    {
        $this->pictures->remove($picture);
    }

    /**
     * @param ArrayCollection $pictures
     * @return Announcement
     */
    public function setPictures(Collection $pictures)
    {
        $this->pictures = $pictures;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @param Attribute $value
     */
    public function addAttribute(Attribute $value)
    {
        $this->attributes->add($value);
    }

    /**
     * @param Attribute $value
     */
    public function removeAttribute(Attribute $value)
    {
        $this->attributes->remove($value);
    }

    /**
     * @param ArrayCollection $values
     * @return Variation
     */
    public function setAttributes(Collection $values)
    {
        $this->attributes = $values;
        return $this;
    }

    /**
     * @return Collection
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
     * @param Collection $values
     * @return Item
     */
    public function setVariations(Collection $values)
    {
        $this->variations = $values;
        return $this;
    }
}