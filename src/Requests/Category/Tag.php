<?php
/**
 * Class Tag
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Requests\Category;

use JMS\Serializer\Annotation as JMS;

class Tag
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
    private $definesPicture;

    /**
     * @var boolean
     * @JMS\Type("boolean")
     */
    private $catalogRequired;

    /**
     * @var boolean
     * @JMS\Type("boolean")
     */
    private $fixed;

    /**
     * @var boolean
     * @JMS\Type("boolean")
     */
    private $hidden;

    /**
     * @var boolean
     * @JMS\Type("boolean")
     */
    private $inferred;

    /**
     * @var boolean
     * @JMS\Type("boolean")
     */
    private $multivalued;

    /**
     * @var boolean
     * @JMS\Type("boolean")
     */
    private $others;

    /**
     * @var boolean
     * @JMS\Type("boolean")
     */
    private $productPk;

    /**
     * @var boolean
     * @JMS\Type("boolean")
     */
    private $readOnly;

    /**
     * @var boolean
     * @JMS\Type("boolean")
     */
    private $required;

    /**
     * @var boolean
     * @JMS\Type("boolean")
     */
    private $restrictedValues;

    /**
     * @var boolean
     * @JMS\Type("boolean")
     */
    private $variationAttribute;

    /**
     * @return boolean
     */
    public function isAllowVariations()
    {
        return ($this->allowVariations === null) ? false : $this->allowVariations;
    }

    /**
     * @param boolean $allowVariations
     * @return Tag
     */
    public function setAllowVariations($allowVariations)
    {
        $this->allowVariations = $allowVariations;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isDefinesPicture()
    {
        return ($this->definesPicture === null) ? false : $this->definesPicture;
    }

    /**
     * @param boolean $definesPicture
     * @return Tag
     */
    public function setDefinesPicture($definesPicture)
    {
        $this->definesPicture = $definesPicture;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isCatalogRequired()
    {
        return ($this->catalogRequired === null) ? false : $this->catalogRequired;
    }

    /**
     * @param boolean $catalogRequired
     * @return Tag
     */
    public function setCatalogRequired($catalogRequired)
    {
        $this->catalogRequired = $catalogRequired;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isFixed()
    {
        return ($this->fixed === null) ? false : $this->fixed;
    }

    /**
     * @param boolean $fixed
     * @return Tag
     */
    public function setFixed($fixed)
    {
        $this->fixed = $fixed;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isHidden()
    {
        return ($this->hidden === null) ? false : $this->hidden;
    }

    /**
     * @param boolean $hidden
     * @return Tag
     */
    public function setHidden($hidden)
    {
        $this->hidden = $hidden;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isInferred()
    {
        return ($this->inferred === null) ? false : $this->inferred;
    }

    /**
     * @param boolean $inferred
     * @return Tag
     */
    public function setInferred($inferred)
    {
        $this->inferred = $inferred;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isMultivalued()
    {
        return ($this->multivalued === null) ? false : $this->multivalued;
    }

    /**
     * @param boolean $multivalued
     * @return Tag
     */
    public function setMultivalued($multivalued)
    {
        $this->multivalued = $multivalued;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isOthers()
    {
        return ($this->others === null) ? false : $this->others;
    }

    /**
     * @param boolean $others
     * @return Tag
     */
    public function setOthers($others)
    {
        $this->others = $others;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isProductPk()
    {
        return ($this->productPk === null) ? false : $this->productPk;
    }

    /**
     * @param boolean $productPk
     * @return Tag
     */
    public function setProductPk($productPk)
    {
        $this->productPk = $productPk;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isReadOnly()
    {
        return ($this->readOnly === null) ? false : $this->readOnly;
    }

    /**
     * @param boolean $readOnly
     * @return Tag
     */
    public function setReadOnly($readOnly)
    {
        $this->readOnly = $readOnly;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isRequired()
    {
        return ($this->required === null) ? false : $this->required;
    }

    /**
     * @param boolean $required
     * @return Tag
     */
    public function setRequired($required)
    {
        $this->required = $required;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isRestrictedValues()
    {
        return ($this->restrictedValues === null) ? false : $this->restrictedValues;
    }

    /**
     * @param boolean $restrictedValues
     * @return Tag
     */
    public function setRestrictedValues($restrictedValues)
    {
        $this->restrictedValues = $restrictedValues;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isVariationAttribute()
    {
        return ($this->variationAttribute === null) ? false : $this->variationAttribute;
    }

    /**
     * @param boolean $variationAttribute
     * @return Tag
     */
    public function setVariationAttribute($variationAttribute)
    {
        $this->variationAttribute = $variationAttribute;
        return $this;
    }
}