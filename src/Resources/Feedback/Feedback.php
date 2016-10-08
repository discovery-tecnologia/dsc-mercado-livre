<?php
/**
 * Class Feedback
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Resources\Feedback;

use JMS\Serializer\Annotation as JMS;

class Feedback
{
    /**
     * @var string
     * @JMS\Type("string")
     */
    private $purchase;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $sale;

    /**
     * @return string
     */
    public function getPurchase()
    {
        return $this->purchase;
    }

    /**
     * @param string $purchase
     * @return Feedback
     */
    public function setPurchase($purchase)
    {
        $this->purchase = $purchase;
        return $this;
    }

    /**
     * @return string
     */
    public function getSale()
    {
        return $this->sale;
    }

    /**
     * @param string $sale
     * @return Feedback
     */
    public function setSale($sale)
    {
        $this->sale = $sale;
        return $this;
    }
}