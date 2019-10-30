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
     * @var Purchase
     * @JMS\Type("Dsc\MercadoLivre\Resources\Feedback\Purchase")
     */
    private $purchase;

    /**
     * @var Sale
     * @JMS\Type("Dsc\MercadoLivre\Resources\Feedback\Sale")
     */
    private $sale;

    /**
     * @return Purchase
     */
    public function getPurchase()
    {
        return $this->purchase;
    }

    /**
     * @param Purchase $purchase
     * @return Feedback
     */
    public function setPurchase(Purchase $purchase)
    {
        $this->purchase = $purchase;
        return $this;
    }

    /**
     * @return Sale
     */
    public function getSale()
    {
        return $this->sale;
    }

    /**
     * @param Sale $sale
     * @return Feedback
     */
    public function setSale(Sale $sale)
    {
        $this->sale = $sale;
        return $this;
    }
}