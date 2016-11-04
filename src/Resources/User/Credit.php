<?php
/**
 * Class Credit
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Resources\User;

use JMS\Serializer\Annotation as JMS;

class Credit
{
    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $consumed;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $creditLevelId;

    /**
     * @return int
     */
    public function getConsumed()
    {
        return $this->consumed;
    }

    /**
     * @param int $consumed
     * @return Credit
     */
    public function setConsumed($consumed)
    {
        $this->consumed = $consumed;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreditLevelId()
    {
        return $this->creditLevelId;
    }

    /**
     * @param string $creditLevelId
     * @return Credit
     */
    public function setCreditLevelId($creditLevelId)
    {
        $this->creditLevelId = $creditLevelId;
        return $this;
    }
}