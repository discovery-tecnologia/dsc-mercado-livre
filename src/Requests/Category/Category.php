<?php
/**
 * Class Category
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Requests\Category;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as JMS;

class Category
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
    private $picture;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $permalink;

    /**
     * @var integer
     * @JMS\Type("integer");
     */
    private $totalItemsInThisCategory;

    /**
     * @var ArrayCollection
     * @JMS\Type("ArrayCollection<Dsc\MercadoLivre\Requests\Category\PathFromRoot>")
     */
    private $pathFromRoot;

    /**
     * @var ArrayCollection
     * @JMS\Type("ArrayCollection<Dsc\MercadoLivre\Requests\Category\Category>")
     */
    private $childrenCategories;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $attributeTypes;

    /**
     * @var Settings
     * @JMS\Type("Dsc\MercadoLivre\Requests\Category\Settings")
     */
    private $settings;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $metaCategId;

    /**
     * @var boolean
     * @JMS\Type("boolean")
     */
    private $attributable;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
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
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * @param string $picture
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;
    }

    /**
     * @return string
     */
    public function getPermalink()
    {
        return $this->permalink;
    }

    /**
     * @param string $permalink
     */
    public function setPermalink($permalink)
    {
        $this->permalink = $permalink;
    }

    /**
     * @return int
     */
    public function getTotalItemsInThisCategory()
    {
        return $this->totalItemsInThisCategory;
    }

    /**
     * @param int $totalItemsInThisCategory
     */
    public function setTotalItemsInThisCategory($totalItemsInThisCategory)
    {
        $this->totalItemsInThisCategory = $totalItemsInThisCategory;
    }

    /**
     * @return ArrayCollection
     */
    public function getPathFromRoot()
    {
        return $this->pathFromRoot;
    }

    /**
     * @param ArrayCollection $pathFromRoot
     */
    public function setPathFromRoot($pathFromRoot)
    {
        $this->pathFromRoot = $pathFromRoot;
    }

    /**
     * @return ArrayCollection
     */
    public function getChildrenCategories()
    {
        return $this->childrenCategories;
    }

    /**
     * @param ArrayCollection $childrenCategories
     */
    public function setChildrenCategories($childrenCategories)
    {
        $this->childrenCategories = $childrenCategories;
    }

    /**
     * @return string
     */
    public function getAttributeTypes()
    {
        return $this->attributeTypes;
    }

    /**
     * @param string $attributeTypes
     */
    public function setAttributeTypes($attributeTypes)
    {
        $this->attributeTypes = $attributeTypes;
    }

    /**
     * @return Settings
     */
    public function getSettings()
    {
        return $this->settings;
    }

    /**
     * @param Settings $settings
     */
    public function setSettings($settings)
    {
        $this->settings = $settings;
    }

    /**
     * @return string
     */
    public function getMetaCategId()
    {
        return $this->metaCategId;
    }

    /**
     * @param string $metaCategId
     */
    public function setMetaCategId($metaCategId)
    {
        $this->metaCategId = $metaCategId;
    }

    /**
     * @return boolean
     */
    public function isAttributable()
    {
        return $this->attributable;
    }

    /**
     * @param boolean $attributable
     */
    public function setAttributable($attributable)
    {
        $this->attributable = $attributable;
    }
}