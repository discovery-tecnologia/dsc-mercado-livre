<?php
/**
 * Class Purchase
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Resources\Feedback;

use JMS\Serializer\Annotation as JMS;

class Purchase
{
    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $id;

    /**
     * @var \DateTime
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s.000-04:00'>")
     */
    private $dateCreated;

    /**
     * @var boolean
     * @JMS\Type("boolean")
     */
    private $fulfilled;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $rating;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $status;

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param integer $id
     * @return Purchase
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @return Purchase
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isFulfilled()
    {
        return $this->fulfilled;
    }

    /**
     * @param boolean $value
     * @return Purchase
     */
    public function setFulfilled($value)
    {
        $this->fulfilled = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @param string $rating
     * @return Purchase
     */
    public function setRating($rating)
    {
        $this->rating = $rating;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return Purchase
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }
}