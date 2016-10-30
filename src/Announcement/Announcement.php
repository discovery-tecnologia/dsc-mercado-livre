<?php
/**
 * Interface Announcement
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Announcement;

use Doctrine\Common\Collections\Collection;

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
     * @return Collection
     */
    public function getPictures();

    /**
     * @param Image $picture
     */
    public function addPicture(Image $picture);

    /**
     * @param Image $picture
     */
    public function removePicture(Image $picture);

    /**
     * @param Collection $pictures
     * @return Announcement
     */
    public function setPictures(Collection $pictures);
}