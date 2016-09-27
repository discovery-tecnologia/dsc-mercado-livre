<?php
/**
 * Class Shipping
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Product;

use JMS\Serializer\Annotation as JMS;

class Shipping
{
    /**
     * @var string
     * @JMS\Type("string")
     */
    private $mode;

    /**
     * @var boolean
     * @JMS\Type("boolean")
     */
    private $localPickUp;

    /**
     * @var boolean
     * @JMS\Type("boolean")
     */
    private $freeShipping;

    //TODO mapping free methods

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $dimensions;

    /**
     * @var array
     * @JMS\Type("array")
     */
    private $tags;

    /**
     * @return string
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * @param string $mode
     * @return Shipping
     */
    public function setMode($mode)
    {
        $this->mode = $mode;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isLocalPickUp()
    {
        return $this->localPickUp;
    }

    /**
     * @param boolean $localPickUp
     * @return Shipping
     */
    public function setLocalPickUp($localPickUp)
    {
        $this->localPickUp = $localPickUp;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isFreeShipping()
    {
        return $this->freeShipping;
    }

    /**
     * @param boolean $freeShipping
     * @return Shipping
     */
    public function setFreeShipping($freeShipping)
    {
        $this->freeShipping = $freeShipping;
        return $this;
    }

    /**
     * @return string
     */
    public function getDimensions()
    {
        return $this->dimensions;
    }

    /**
     * @param string $dimensions
     * @return Shipping
     */
    public function setDimensions($dimensions)
    {
        $this->dimensions = $dimensions;
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
     * @param $tag
     * @return Shipping
     */
    public function addTag($tag)
    {
        $this->tags[] = $tag;
        return $this;
    }

    /**
     * @param array $tags
     * @return Shipping
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
        return $this;
    }
}