<?php
/**
 * Class OrderItem
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Resources\Order;

use JMS\Serializer\Annotation as JMS;

class OrderItem
{
    /**
     * @var string
     * @JMS\Type("string")
     */
    private $currencyId;

    /**
     * @var Item
     * @JMS\Type("Dsc\MercadoLivre\Resources\Order\Item")
     */
    private $item;

    /**
     * @var double
     * @JMS\Type("double")
     */
    private $saleFee;

    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $quantity;

    /**
     * @var double
     * @JMS\Type("double")
     */
    private $unitPrice;

    /**
     * @return string
     */
    public function getCurrencyId()
    {
        return $this->currencyId;
    }

    /**
     * @param string $currencyId
     * @return OrderItem
     */
    public function setCurrencyId($currencyId)
    {
        $this->currencyId = $currencyId;
        return $this;
    }

    /**
     * @return Item
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * @param Item $item
     * @return OrderItem
     */
    public function setItem(Item $item)
    {
        $this->item = $item;
        return $this;
    }

    /**
     * @return float
     */
    public function getSaleFee()
    {
        return $this->saleFee;
    }

    /**
     * @param float $saleFee
     * @return OrderItem
     */
    public function setSaleFee($saleFee)
    {
        $this->saleFee = $saleFee;
        return $this;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     * @return OrderItem
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * @return float
     */
    public function getUnitPrice()
    {
        return $this->unitPrice;
    }

    /**
     * @param float $unitPrice
     * @return OrderItem
     */
    public function setUnitPrice($unitPrice)
    {
        $this->unitPrice = $unitPrice;
        return $this;
    }
}