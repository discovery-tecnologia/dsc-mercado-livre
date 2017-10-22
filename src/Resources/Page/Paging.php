<?php
/**
 * Class Paging
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Resources\Page;

use JMS\Serializer\Annotation as JMS;

class Paging
{
    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $total;

    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $offset;

    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $limit;

    /**
     * @return int
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param int $total
     * @return Paging
     */
    public function setTotal($total)
    {
        $this->total = $total;
        return $this;
    }

    /**
     * @return int
     */
    public function getOffset()
    {
        return $this->offset;
    }

    /**
     * @param int $offset
     * @return Paging
     */
    public function setOffset($offset)
    {
        $this->offset = $offset;
        return $this;
    }

    /**
     * @return int
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * @param int $limit
     * @return Paging
     */
    public function setLimit($limit)
    {
        $this->limit = $limit;
        return $this;
    }
}