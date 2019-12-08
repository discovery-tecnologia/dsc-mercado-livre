<?php
/**
 * Class ListingType
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 * 
 * @link https://developers.mercadolivre.com.br/pt_br/publicacao-de-produtos#Tipos-de-publicacao
 */
namespace Dsc\MercadoLivre\Requests\Category;

use JMS\Serializer\Annotation as JMS;

class ListingType
{
    /**
     * @var string
     * @JMS\Type("string")
     */
    private $id;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $siteId;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $name;

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $siteId
     */
    public function setSiteId($siteId)
    {
        $this->siteId = $siteId;
    }

    /**
     * @return string
     */
    public function getSiteId()
    {
        return $this->siteId;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
