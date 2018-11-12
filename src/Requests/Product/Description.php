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
     * @var string
     * @JMS\Type("string")
     */
    private $plainText;

    /**
     * @var \DateTime
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s.u\Z'>")
     */
    private $dateCreated;

    /**
     * @var \DateTime
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s.u\Z'>")
     */
    private $lastUpdated;

    /**
     * constructor
     */
    public function __construct($text = null)
    {
        $this->plainText = $text;
    }

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

    /**
     * @return string
     */
    public function getPlainText()
    {
        return $this->plainText;
    }

    /**
     * @param string $text
     * @return Description
     */
    public function setPlainText($text)
    {
        $this->plainText = $text;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * @param \DateTime $dateCreated
     * @return Description
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getLastUpdated()
    {
        return $this->lastUpdated;
    }

    /**
     * @param \DateTime $lastUpdated
     * @return Description
     */
    public function setLastUpdated($lastUpdated)
    {
        $this->lastUpdated = $lastUpdated;
        return $this;
    }
}