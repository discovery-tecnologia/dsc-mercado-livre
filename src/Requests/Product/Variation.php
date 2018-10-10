<?php
/**
 * Class Variation
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 * 
 * @link https://developers.mercadolibre.com/pt_br/variacoes
 */
namespace Dsc\MercadoLivre\Requests\Product;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use JMS\Serializer\Annotation as JMS;
use Dsc\MercadoLivre\Requests\Category\AttributeCombination;
use Dsc\MercadoLivre\Requests\Category\Attribute;

class Variation
{
    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $id;

    /**
     * @var ArrayCollection
     * @JMS\Type("ArrayCollection<Dsc\MercadoLivre\Requests\Category\AttributeCombination>")
     */
    private $attributeCombinations;
    
    /**
     * @var double
     * @JMS\Type("double")
     */
    private $price;

    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $availableQuantity;

    /**
     * @var ArrayCollection
     * @JMS\Type("ArrayCollection<Dsc\MercadoLivre\Requests\Category\Attribute>")
     */
    private $attributes;

    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $soldQuantity;

    /**
     * @var array
     * @JMS\Type("array")
     */
    private $pictureIds;

    /**
     * Variation constructor.
     */
    public function __construct()
    {
        $this->attributeCombinations = new ArrayCollection();
        $this->attributes = new ArrayCollection();
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param integer $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return ArrayCollection
     */
    public function getAttributeCombinations()
    {
        return $this->attributeCombinations;
    }

    /**
     * @param AttributeCombination $value
     */
    public function addAttributeCombination(AttributeCombination $value)
    {
        $this->attributeCombinations->add($value);
    }

    /**
     * @param AttributeCombination $value
     */
    public function removeAttributeCombination(AttributeCombination $value)
    {
        $this->attributeCombinations->remove($value);
    }

    /**
     * @param ArrayCollection $values
     * @return Variation
     */
    public function setAttributeCombinations(Collection $values)
    {
        $this->attributeCombinations = $values;
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
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return integer
     */
    public function getAvailableQuantity()
    {
        return $this->availableQuantity;
    }

    /**
     * @param integer $availableQuantity
     */
    public function setAvailableQuantity($availableQuantity)
    {
        $this->availableQuantity = $availableQuantity;
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
     * @return integer
     */
    public function getSoldQuantity()
    {
        return $this->soldQuantity;
    }

    /**
     * @param integer $soldQuantity
     */
    public function setSoldQuantity($soldQuantity)
    {
        $this->soldQuantity = $soldQuantity;
    }

    /**
     * @return array
     */
    public function getPictureIds()
    {
        return $this->pictureIds;
    }

    /**
     * @param array $pictureIds
     * @return Variation
     */
    public function setPictureIds($pictureIds)
    {
        $this->pictureIds = $pictureIds;
        return $this;
    }
}