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
    private $valueType;

    /**
     * @var ArrayCollection
     * @JMS\Type("ArrayCollection<Dsc\MercadoLivre\Requests\Category\Tags>")
     */
    private $tags;

    /**
     * Attributes constructor.
     */
    public function __construct()
    {
        $this->tags = new ArrayCollection();
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
     * @return ArrayCollection
     */
    public function getTags()
    {
        return $this->pictures;
    }

    /**
     * @param Tags $tag
     */
    public function addTags(Tags $tag)
    {
        $this->tags->add($tag);
    }

    /**
     * @param Tags $tag
     */
    public function removeTag(Tags $tag)
    {
        $this->tags->remove($tag);
    }

    /**
     * @param ArrayCollection $tags
     * @return Attributes
     */
    public function setTags(Collection $tags)
    {
        $this->tags = $tags;
        return $this;
    }

    //TODO Mapear os demais atributos
}