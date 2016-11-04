<?php
/**
 * Class BuyerReputation
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Resources\User;

use JMS\Serializer\Annotation as JMS;

class BuyerReputation
{
    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $canceledTransactions;

    /**
     * @var Transactions
     * @JMS\Type("Dsc\MercadoLivre\Resources\User\Transactions")
     */
    private $transactions;

    /**
     * @var array
     * @JMS\Type("array")
     */
    private $tags;

    /**
     * @return int
     */
    public function getCanceledTransactions()
    {
        return $this->canceledTransactions;
    }

    /**
     * @param int $canceledTransactions
     * @return BuyerReputation
     */
    public function setCanceledTransactions($canceledTransactions)
    {
        $this->canceledTransactions = $canceledTransactions;
        return $this;
    }

    /**
     * @return Transactions
     */
    public function getTransactions()
    {
        return $this->transactions;
    }

    /**
     * @param Transactions $transactions
     * @return BuyerReputation
     */
    public function setTransactions(Transactions $transactions)
    {
        $this->transactions = $transactions;
        return $this;
    }

    /**
     * @return array
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param array $tags
     * @return BuyerReputation
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
        return $this;
    }
}