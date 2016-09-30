<?php
/**
 * Class Product
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Publish\Product;

use JMS\Serializer\Annotation as JMS;

class ProductResponse
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
    private $siteId;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $title;

    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $soldQuantity;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $permalink;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Product
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getSiteId()
    {
        return $this->siteId;
    }

    /**
     * @param string $siteId
     * @return Product
     */
    public function setSiteId($siteId)
    {
        $this->siteId = $siteId;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Product
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return int
     */
    public function getSoldQuantity()
    {
        return $this->soldQuantity;
    }

    /**
     * @param int $soldQuantity
     * @return Product
     */
    public function setSoldQuantity($soldQuantity)
    {
        $this->soldQuantity = $soldQuantity;
        return $this;
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
     * @return Product
     */
    public function setPermalink($permalink)
    {
        $this->permalink = $permalink;
        return $this;
    }
}