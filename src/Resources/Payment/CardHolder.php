<?php
/**
 * Class CardHolder
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Resources\Payment;

use JMS\Serializer\Annotation as JMS;

class CardHolder
{
    /**
     * @var string
     * @JMS\Type("string")
     */
    private $name;

    /**
     * @var CardHolderIdentification
     * @JMS\Type("Dsc\MercadoLivre\Resources\Payment\CardHolderIdentification")
     */
    private $identification;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return CardHolder
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return CardHolderIdentification
     */
    public function getIdentification()
    {
        return $this->identification;
    }

    /**
     * @param CardHolderIdentification $identification
     * @return CardHolder
     */
    public function setIdentification($identification)
    {
        $this->identification = $identification;
        return $this;
    }
}
