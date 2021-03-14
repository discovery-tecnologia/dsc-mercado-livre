<?php
namespace  Dsc\MercadoLivre\Requests\Category;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use JMS\Serializer\Annotation as JMS;

class Predictor
{
    /**
     * @var string
     * @JMS\Type("string")
     */
    private $domainId;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $domainName;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $categoryId;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $categoryName;

    /**
     * @var ArrayCollection
     * @JMS\Type("ArrayCollection<Dsc\MercadoLivre\Requests\Category\AttributeCombination>")
     */
    private $attributes;

    /**
    * Get $domainId
    * @return string
    */
    public function getDomainId()
    {
        return $this->domainId;
    }

    /**
    * Set $domainId
    * @param string $domainId
    */
    public function setDomainId($domainId)
    {
        $this->domainId = $domainId;
    }

    /**
    * Get $domainName
    * @return string
    */
    public function getDomainName()
    {
        return $this->domainName;
    }

    /**
    * Set $domainName
    * @param string $domainName
    */
    public function setDomainName($domainName)
    {
        $this->domainName = $domainName;
    }

    /**
    * Get $categoryId
    * @return string
    */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
    * Set $categoryId
    * @param string $categoryId
    */
    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;
    }

    /**
    * Get $categoryName
    * @return string
    */
    public function getCategoryName()
    {
        return $this->categoryName;
    }

    /**
    * Set $categoryName
    * @param string $categoryName
    */
    public function setCategoryName($categoryName)
    {
        $this->categoryName = $categoryName;
    }

    /**
    * Get $attributes
    * @return ArrayCollection
    */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
    * Set $attributes
    * @param ArrayCollection $attributes
    */
    public function setAttributes(Collection $attributes)
    {
        $this->attributes = $attributes;
    }

    /**
     * @param AttributeCombination $combination
     */
    public function addAttribute(AttributeCombination $combination)
    {
        return $this->attributes->add($combination);
    }

    /**
     * @param AttributeCombination $combination
     */
    public function removeAttribute(AttributeCombination $combination)
    {
        $this->attributes->remove($combination);
    }
}