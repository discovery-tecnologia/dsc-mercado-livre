<?php
/**
 * Class ShippingModes
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Resources\User;

use JMS\Serializer\Annotation as JMS;

class ShippingModes
{
    /**
     * @var string
     * @JMS\Type("string")
     */
    private $mode;

    /**
     * @return string
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * @param string $mode
     * @return ShippingModes
     */
    public function setMode($mode)
    {
        $this->mode = $mode;
        return $this;
    }
}