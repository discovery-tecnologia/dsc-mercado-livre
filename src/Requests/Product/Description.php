<?php
/**
 * Class Description
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Requests\Product;

use JMS\Serializer\Annotation as JMS;

class Description
{
    /**
     * @var string
     * @JMS\Type("string")
     */
    private $id;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Description
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
}