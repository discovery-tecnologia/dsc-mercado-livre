<?php
/**
 * Class Item
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Resources\Order;

use JMS\Serializer\Annotation as JMS;

class Item
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
    private $sellerCustomField;

    /**
     * @var array
     * @JMS\Type("array")
     */
    private $variationAttributes;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $categoryId;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $variationId;

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
     * @return Item
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getSellerCustomField()
    {
        return $this->sellerCustomField;
    }

    /**
     * @param string $sellerCustomField
     * @return Item
     */
    public function setSellerCustomField($sellerCustomField)
    {
        $this->sellerCustomField = $sellerCustomField;
        return $this;
    }

    /**
     * @return array
     */
    public function getVariationAttributes()
    {
        return $this->variationAttributes;
    }

    /**
     * @param array $variationAttributes
     * @return Item
     */
    public function setVariationAttributes($variationAttributes)
    {
        $this->variationAttributes = $variationAttributes;
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
     * @return Item
     */
    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;
        return $this;
    }

    /**
     * @return string
     */
    public function getVariationId()
    {
        return $this->variationId;
    }

    /**
     * @param string $variationId
     * @return Item
     */
    public function setVariationId($variationId)
    {
        $this->variationId = $variationId;
        return $this;
    }
}