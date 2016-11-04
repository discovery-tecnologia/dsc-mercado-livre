<?php
/**
 * Class SellerReputation
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Resources\User;

use JMS\Serializer\Annotation as JMS;

class SellerReputation
{
    /**
     * @var string
     * @JMS\Type("string")
     */
    private $levelId;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $powerSellerStatus;

    /**
     * @var Transactions
     * @JMS\Type("Dsc\MercadoLivre\Resources\User\Transactions")
     */
    private $transactions;

    /**
     * @return string
     */
    public function getLevelId()
    {
        return $this->levelId;
    }

    /**
     * @param string $levelId
     * @return SellerReputation
     */
    public function setLevelId($levelId)
    {
        $this->levelId = $levelId;
        return $this;
    }

    /**
     * @return string
     */
    public function getPowerSellerStatus()
    {
        return $this->powerSellerStatus;
    }

    /**
     * @param string $powerSellerStatus
     * @return SellerReputation
     */
    public function setPowerSellerStatus($powerSellerStatus)
    {
        $this->powerSellerStatus = $powerSellerStatus;
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
     * @return SellerReputation
     */
    public function setTransactions(Transactions $transactions)
    {
        $this->transactions = $transactions;
        return $this;
    }
}