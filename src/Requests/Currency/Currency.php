<?php
/**
 * Class Currency
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Requests\Currency;

use JMS\Serializer\Annotation as JMS;

class Currency
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
    private $description;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $symbol;

    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $decimalPlaces;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Currency
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Currency
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getSymbol()
    {
        return $this->symbol;
    }

    /**
     * @param string $symbol
     * @return Currency
     */
    public function setSymbol($symbol)
    {
        $this->symbol = $symbol;
        return $this;
    }

    /**
     * @return int
     */
    public function getDecimalPlaces()
    {
        return $this->decimalPlaces;
    }

    /**
     * @param int $decimalPlaces
     * @return Currency
     */
    public function setDecimalPlaces($decimalPlaces)
    {
        $this->decimalPlaces = $decimalPlaces;
        return $this;
    }
}