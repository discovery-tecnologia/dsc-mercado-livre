<?php


namespace Dsc\MercadoLivre\Requests\Trends;

use JMS\Serializer\Annotation as JMS;

class Trend
{
    /**
     * @var string
     * @JMS\Type("string")
     */
    private $keyword;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $url;

    /**
     * @param string $keyword
     */
    public function setKeyword($keyword)
    {
        $this->keyword = $keyword;
    }

    /**
     * @return string
     */
    public function getKeyword()
    {
        return $this->keyword;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }
}