<?php
/**
 * Class EstimatedDelivery
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Resources\Shipment\Option;

use JMS\Serializer\Annotation as JMS;

class EstimatedDelivery
{
    /**
     * @var \DateTime
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s.u-03:00'>")
     */
    private $date;

    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $offset;

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     * @return EstimatedDelivery
     */
    public function setDate($date)
    {
        $this->date = $date;
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
     * @return EstimatedDelivery
     */
    public function setOffset($offset)
    {
        $this->offset = $offset;
        return $this;
    }
}
