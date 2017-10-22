<?php
/**
 * Class Sort
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Resources\Page;

use JMS\Serializer\Annotation as JMS;

class Sort
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
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Sort
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
     * @return Sort
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}