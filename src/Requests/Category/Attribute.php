<?php
/**
 * Class Attribute
 *
 * Atributos da Categoria
 * 
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 * 
 * @link https://api.mercadolibre.com/categories/MLA126186/attributes#options
 * 
 */
namespace Dsc\MercadoLivre\Requests\Category;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use JMS\Serializer\Annotation as JMS;

class Attribute
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
    private $name;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $hierarchy;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $valueType;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $valueName;

    /**
     * @var Tag
     * @JMS\Type("Dsc\MercadoLivre\Requests\Category\Tag")
     */
    private $tags;

    /**
     * @var ArrayCollection
     * @JMS\Type("ArrayCollection<Dsc\MercadoLivre\Requests\Category\AttributeValue>")
     */
    private $values;

    /**
     * @var ArrayCollection
     * @JMS\Type("ArrayCollection<Dsc\MercadoLivre\Requests\Category\AllowedUnit>")
     */
    private $allowedUnits;

    /**
     * Attributes constructor.
     */
    public function __construct()
    {
        $this->values = new ArrayCollection();
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
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getHierarchy()
    {
        return $this->hierarchy;
    }

    /**
     * @param string $hierarchy
     */
    public function setHierarchy($hierarchy)
    {
        $this->hierarchy = $hierarchy;
    }

    /**
     * @return string
     */
    public function getValueType()
    {
        return $this->valueType;
    }

    /**
     * @param string $valueType
     */
    public function setValueType($valueType)
    {
        $this->valueType = $valueType;
    }

    /**
     * @return string
     */
    public function getValueName()
    {
        return $this->valueName;
    }

    /**
     * @param string $valueName
     */
    public function setValueName($valueName)
    {
        $this->valueName = $valueName;
    }

    /**
     * @return Tag
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param Tag $tag
     * @return Attribute
     */
    public function setTags(Tag $tag)
    {
        $this->tags = $tag;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getValues()
    {
        return $this->values;
    }

    /**
     * @param AttributeValue $value
     */
    public function addValue(AttributeValue $value)
    {
        $this->values->add($value);
    }

    /**
     * @param AttributeValue $value
     */
    public function removeValue(AttributeValue $value)
    {
        $this->values->remove($value);
    }

    /**
     * @param ArrayCollection $values
     * @return Attributes
     */
    public function setValues(Collection $values)
    {
        $this->values = $values;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getAllowedUnits()
    {
        return $this->allowedUnits;
    }

    /**
     * @param ArrayCollection $allowedUnits
     * @return Attributes
     */
    public function setAllowedUnits(Collection $allowedUnits)
    {
        $this->allowedUnits = $allowedUnits;
        return $this;
    }

    //TODO Mapear os demais atributos
}