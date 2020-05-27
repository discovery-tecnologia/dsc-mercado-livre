<?php
/**
 * Class CostComponents
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Resources\Shipment;

use JMS\Serializer\Annotation as JMS;

class CostComponents
{
    /**
     * @var double
     * @JMS\Type("double")
     */
    private $specialDiscount;

    /**
     * @var double
     * @JMS\Type("double")
     */
    private $loyalDiscount;

    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $compensation;

    /**
     * @var double
     * @JMS\Type("double")
     */
    private $gapDiscount;

    /**
     * @var double
     * @JMS\Type("double")
     */
    private $ratio;

    /**
     * @return float
     */
    public function getSpecialDiscount()
    {
        return $this->specialDiscount;
    }

    /**
     * @param float $specialDiscount
     * @return CostComponents
     */
    public function setSpecialDiscount($specialDiscount)
    {
        $this->specialDiscount = $specialDiscount;
        return $this;
    }

    /**
     * @return float
     */
    public function getLoyalDiscount()
    {
        return $this->loyalDiscount;
    }

    /**
     * @param float $loyalDiscount
     * @return CostComponents
     */
    public function setLoyalDiscount($loyalDiscount)
    {
        $this->loyalDiscount = $loyalDiscount;
        return $this;
    }

    /**
     * @return int
     */
    public function getCompensation()
    {
        return $this->compensation;
    }

    /**
     * @param int $compensation
     * @return CostComponents
     */
    public function setCompensation($compensation)
    {
        $this->compensation = $compensation;
        return $this;
    }

    /**
     * @return float
     */
    public function getGapDiscount()
    {
        return $this->gapDiscount;
    }

    /**
     * @param float $gapDiscount
     * @return CostComponents
     */
    public function setGapDiscount($gapDiscount)
    {
        $this->gapDiscount = $gapDiscount;
        return $this;
    }

    /**
     * @return float
     */
    public function getRatio()
    {
        return $this->ratio;
    }

    /**
     * @param float $ratio
     * @return CostComponents
     */
    public function setRatio($ratio)
    {
        $this->ratio = $ratio;
        return $this;
    }
}
