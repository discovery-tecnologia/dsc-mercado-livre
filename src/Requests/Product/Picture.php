<?php
/**
 * Class Picture
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Requests\Product;

use JMS\Serializer\Annotation as JMS;

class Picture
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
    private $url;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $secureUrl;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $size;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $maxSize;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $quality;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Picture
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param int $url
     * @return Picture
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return int
     */
    public function getSecureUrl()
    {
        return $this->secureUrl;
    }

    /**
     * @param int $secureUrl
     * @return Picture
     */
    public function setSecureUrl($secureUrl)
    {
        $this->secureUrl = $secureUrl;
        return $this;
    }

    /**
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param int $size
     * @return Picture
     */
    public function setSize($size)
    {
        $this->size = $size;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxSize()
    {
        return $this->maxSize;
    }

    /**
     * @param int $maxSize
     * @return Picture
     */
    public function setMaxSize($maxSize)
    {
        $this->maxSize = $maxSize;
        return $this;
    }

    /**
     * @return int
     */
    public function getQuality()
    {
        return $this->quality;
    }

    /**
     * @param int $quality
     * @return Picture
     */
    public function setQuality($quality)
    {
        $this->quality = $quality;
        return $this;
    }
}
