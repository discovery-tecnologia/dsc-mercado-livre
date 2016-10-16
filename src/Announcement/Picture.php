<?php
/**
 * Class Picture
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Announcement;

use JMS\Serializer\Annotation as JMS;

class Picture
{
    /**
     * @var string
     * @JMS\Type("string")
     */
    private $source;

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