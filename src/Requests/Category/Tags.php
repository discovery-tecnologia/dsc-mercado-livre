<?php
/**
 * Class Tags
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Requests\Category;

use JMS\Serializer\Annotation as JMS;

class Tags
{
    /**
     * @var boolean
     * @JMS\Type("boolean")
     */
    private $allowVariations;

    /**
     * @var boolean
     * @JMS\Type("boolean")
     */
    private $hidden;

    /**
     * @return boolean
     */
    public function isAllowVariations()
    {
        return $this->allowVariations;
    }

    /**
     * @param boolean $allowVariations
     * @return Tags
     */
    public function setAllowVariations($allowVariations)
    {
        $this->allowVariations = $allowVariations;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isHidden()
    {
        return $this->hidden;
    }

    /**
     * @param boolean $hidden
     * @return Tags
     */
    public function setHidden($hidden)
    {
        $this->hidden = $hidden;
        return $this;
    }
}