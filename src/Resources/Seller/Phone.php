<?php
/**
 * Class Phone
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Resources\Seller;

use JMS\Serializer\Annotation as JMS;

class Phone
{
    /**
     * @var string
     * @JMS\Type("string")
     */
    private $areaCode;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $number;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $extension;

    /**
     * @return string
     */
    public function getAreaCode()
    {
        return $this->areaCode;
    }

    /**
     * @param string $areaCode
     * @return Phone
     */
    public function setAreaCode($areaCode)
    {
        $this->areaCode = $areaCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param string $number
     * @return Phone
     */
    public function setNumber($number)
    {
        $this->number = $number;
        return $this;
    }

    /**
     * @return string
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * @param string $extension
     * @return Phone
     */
    public function setExtension($extension)
    {
        $this->extension = $extension;
        return $this;
    }
}