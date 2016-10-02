<?php
/**
 * Class Collector
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Resources\Payment;

use JMS\Serializer\Annotation as JMS;

class Collector
{
    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $id;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Collector
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
}