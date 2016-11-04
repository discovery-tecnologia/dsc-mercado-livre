<?php
/**
 * Class Transactions
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Resources\User;

use JMS\Serializer\Annotation as JMS;

class Transactions
{
    /**
     * @var string
     * @JMS\Type("string")
     */
    private $period;

    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $total;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $completed;

    /**
     * @return string
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * @param string $period
     * @return Transactions
     */
    public function setPeriod($period)
    {
        $this->period = $period;
        return $this;
    }

    /**
     * @return int
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param int $total
     * @return Transactions
     */
    public function setTotal($total)
    {
        $this->total = $total;
        return $this;
    }

    /**
     * @return string
     */
    public function getCompleted()
    {
        return $this->completed;
    }

    /**
     * @param string $completed
     * @return Transactions
     */
    public function setCompleted($completed)
    {
        $this->completed = $completed;
        return $this;
    }
}