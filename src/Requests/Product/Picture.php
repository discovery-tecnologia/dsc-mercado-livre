<?php
/**
 * Class Picture
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Requests\Product;

use Dsc\MercadoLivre\Announcement\Image;
use JMS\Serializer\Annotation as JMS;

class Picture implements Image
{
    /**
     * @var string
     * @JMS\Type("string")
     */
    private $id;

    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $url;

    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $secureUrl;

    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $size;

    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $maxSize;

    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $quality;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $source;

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

    /**
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param string $source
     * @return Picture
     */
    public function setSource($source)
    {
        $this->source = $source;
        return $this;
    }
}