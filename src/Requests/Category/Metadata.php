<?php
/**
 * Class AttributeValue
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Requests\Category;

use JMS\Serializer\Annotation as JMS;

class Metadata
{
    /**
     * @var string
     * @JMS\Type("string")
     */
    private $rgb;

    /**
     * @return string
     */
    public function getRgb()
    {
        return $this->rgb;
    }

    /**
     * @param string $rgb
     */
    public function setRgb($rgb)
    {
        $this->rgb = $rgb;
    }
}