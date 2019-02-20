<?php
/**
 * Interface Announcement
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Announcement;

use Doctrine\Common\Collections\Collection;
use Dsc\MercadoLivre\Requests\Product\Variation;
use Dsc\MercadoLivre\Requests\Product\Shipping;
use Dsc\MercadoLivre\Requests\Product\SellerAddress;
use Dsc\MercadoLivre\Requests\Product\Location;

interface Announcement
{
    /**
     * @return string
     */
    public function getId();

    /**
     * @param string $id
     * @return Announcement
     */
    public function setId($id);

    /**
     * @return string
     */
    public function getTitle();

    /**
     * @param string $title
     * @return Announcement
     */
    public function setTitle($title);

    /**
     * @return string
     */
    public function getCategoryId();

    /**
     * @param string $categoryId
     * @return Announcement
     */
    public function setCategoryId($categoryId);

    /**
     * @return double
     */
    public function getPrice();

    /**
     * @param double $price
     * @return Announcement
     */
    public function setPrice($price);

    /**
     * @return string
     */
    public function getCurrencyId();

    /**
     * @param string $currencyId
     * @return Announcement
     */
    public function setCurrencyId($currencyId);

    /**
     * @return int
     */
    public function getAvailableQuantity();

    /**
     * @param int $availableQuantity
     * @return Announcement
     */
    public function setAvailableQuantity($availableQuantity);

    /**
     * @return string
     */
    public function getBuyingMode();

    /**
     * @param string $buyingMode
     * @return Announcement
     */
    public function setBuyingMode($buyingMode);

    /**
     * @return string
     */
    public function getListingTypeId();

    /**
     * @param string $listingTypeId
     * @return Announcement
     */
    public function setListingTypeId($listingTypeId);

    /**
     * @return string
     */
    public function getCondition();

    /**
     * @param string $condition
     * @return Announcement
     */
    public function setCondition($condition);

    /**
     * @return string
     */
    public function getDescription();

    /**
     * @param string $description
     * @return Announcement
     */
    public function setDescription($description);

    /**
     * @return string
     */
    public function getVideoId();

    /**
     * @param string $videoId
     * @return Announcement
     */
    public function setVideoId($videoId);

    /**
     * @return array
     */
    public function getTags();

    /**
     * @param array $tags
     * @return Announcement
     */
    public function setTags($tags);

    /**
     * @return string
     */
    public function getWarranty();

    /**
     * @param string $warranty
     * @return Announcement
     */
    public function setWarranty($warranty);

    /**
     * @return string
     */
    public function getStatus();

    /**
     * @param string $status
     * @return Announcement
     */
    public function setStatus($status);

    /**
     * @return Collection
     */
    public function getPictures();

    /**
     * @param Picture $picture
     */
    public function addPicture(Picture $picture);

    /**
     * @param Picture $picture
     */
    public function removePicture(Picture $picture);

    /**
     * @param Collection $pictures
     * @return Announcement
     */
    public function setPictures(Collection $pictures);

    /**
     * @return Collection
     */
    public function getVariations();

    /**
     * @param Variation $value
     */
    public function addVariation(Variation $value);

    /**
     * @param Variation $value
     */
    public function removeVariation(Variation $value);

    /**
     * @param Collection $values
     * @return Item
     */
    public function setVariations(Collection $values);

    /**
     * @return Shipping
     */
    public function getShipping();

    /**
     * @param Shipping $shipping
     * @return Item
     */
    public function setShipping(Shipping $shipping);

    /**
     * @return SellerAddress
     */
    public function getSellerAddress();

    /**
     * @param SellerAddress $sellerAddress
     * @return Item
     */
    public function setSellerAddress(SellerAddress $sellerAddress);

    /**
     * @return Location
     */
    public function getLocation();

    /**
     * @param Location $location
     * @return Item
     */
    public function setLocation(Location $location);
}