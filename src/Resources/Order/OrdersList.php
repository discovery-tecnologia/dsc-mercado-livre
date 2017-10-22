<?php
/**
 * Class Order
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Resources\Order;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Dsc\MercadoLivre\Resources\Buyer\Buyer;
use Dsc\MercadoLivre\Resources\Feedback\Feedback;
use Dsc\MercadoLivre\Resources\Page\Paging;
use Dsc\MercadoLivre\Resources\Payment\Payment;
use Dsc\MercadoLivre\Resources\Seller\Seller;
use Dsc\MercadoLivre\Resources\Shipping\Shipping;
use JMS\Serializer\Annotation as JMS;

class OrdersList
{
    /**
     * @var string
     * @JMS\Type("string")
     */
    private $query;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $display;

    /**
     * @var Paging
     * @JMS\Type("Dsc\MercadoLivre\Resources\Page\Paging")
     */
    private $paging;

    /**
     * @var ArrayCollection
     * @JMS\Type("ArrayCollection<Dsc\MercadoLivre\Resources\Order\Order>")
     */
    private $results;

    /**
     * Order constructor.
     */
    public function __construct()
    {
        $this->results = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * @param string $query
     * @return OrdersList
     */
    public function setQuery($query)
    {
        $this->query = $query;
        return $this;
    }

    /**
     * @return string
     */
    public function getDisplay()
    {
        return $this->display;
    }

    /**
     * @param string $display
     * @return OrdersList
     */
    public function setDisplay($display)
    {
        $this->display = $display;
        return $this;
    }

    /**
     * @return Paging
     */
    public function getPaging()
    {
        return $this->paging;
    }

    /**
     * @param Paging $paging
     * @return OrdersList
     */
    public function setPaging($paging)
    {
        $this->paging = $paging;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getResults()
    {
        return $this->results;
    }

    /**
     * @param ArrayCollection $results
     * @return OrdersList
     */
    public function setResults($results)
    {
        $this->results = $results;
        return $this;
    }
}