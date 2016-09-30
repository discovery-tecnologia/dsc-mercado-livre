<?php
/**
 * Class Product
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Publish\Product;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use JMS\Serializer\Annotation as JMS;

class Product
{
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
     * @var integer
     * @JMS\Type("integer")
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
     * @var string
     * @JMS\Type("string")
     */
    private $warranty;

    /**
     * @var ArrayCollection
     * @JMS\Type("ArrayCollection<Dsc\MercadoLivre\Publish\Product\Picture>")
     */
    private $pictures;

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
     * @return Product
     */
    public function setPictures(Collection $pictures)
    {
        $this->pictures = $pictures;
        return $this;
    }
}