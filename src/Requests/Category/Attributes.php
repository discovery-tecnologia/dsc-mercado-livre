<?php
/**
 * Class Attributes
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Requests\Category;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use JMS\Serializer\Annotation as JMS;

class Attributes
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
    private $type;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $valueType;

    /**
     * @var Tags
     * @JMS\Type("Dsc\MercadoLivre\Requests\Category\Tags")
     */
    private $tags;

    /**
     * @var ArrayCollection
     * @JMS\Type("ArrayCollection<Dsc\MercadoLivre\Requests\Category\AttributeValue>")
     */
    private $values;

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
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
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
     * @return Tags
     */
    public function getTags()
    {
        return $this->pictures;
    }

    /**
     * @param Tags $tags
     * @return Attributes
     */
    public function setTags(Tags $tags)
    {
        $this->tags = $tags;
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

    //TODO Mapear os demais atributos
}