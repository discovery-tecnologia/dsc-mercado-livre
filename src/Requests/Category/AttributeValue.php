<?php
/**
 * Class AttributeValue
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Requests\Category;

use JMS\Serializer\Annotation as JMS;

class AttributeValue
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
     * @var Metadata
     * @JMS\Type("Dsc\MercadoLivre\Requests\Category\Metadata")
     */
    private $metadata;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return AttributeValue
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
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
     * @return AttributeValue
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return Metadata
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * @param Metadata $metadata
     * @return AttributeValue
     */
    public function setMetadata(Metadata $metadata)
    {
        $this->metadata = $metadata;
        return $this;
    }
}