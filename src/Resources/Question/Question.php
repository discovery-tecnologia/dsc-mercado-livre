<?php
/**
 * Class Order
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Resources\Question;

use JMS\Serializer\Annotation as JMS;

class Question        
{
    /**
     * @var int
     * @JMS\Type("integer")
     */
    private $id;

    /**
     * @var Answer
     * @JMS\Type("Dsc\MercadoLivre\Resources\Question\Answer")
     */
    private $answer;

    /**
     * @var \DateTime
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s.000-04:00'>")
     */
    private $dateCreated;

    /**
     * @var bool
     * @JMS\Type("boolean")
     */
    private $deletedFromListing;

    /**
     * @var bool
     * @JMS\Type("boolean")
     */
    private $hold;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $itemId; 

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $sellerId; 

    /**
     * @var string
     * ACTIVE e DISABLED
     * @JMS\Type("string")
     */
    private $status;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $text;    

    /**
     * @var From
     * @JMS\Type("Dsc\MercadoLivre\Resources\Question\From")
     */
    private $from;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Question
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return Answer
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * @param Answer $answer
     * @return Question
     */
    public function setAnswer(Answer $answer)
    {
        $this->answer = $answer;
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
     * @return Question
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
        return $this;
    }

    /**
     * @return bool
     */
    public function isDeletedFromListing()
    {
        return $this->deletedFromListing;
    }

    /**
     * @param bool $deletedFromListing
     * @return Question
     */
    public function setDeletedFromListing($deletedFromListing)
    {
        $this->deletedFromListing = $deletedFromListing;
        return $this;
    }

    /**
     * @return bool
     */
    public function isHold()
    {
        return $this->hold;
    }

    /**
     * @param bool $hold
     * @return Question
     */
    public function setHold($hold)
    {
        $this->hold = $hold;
        return $this;
    }

    /**
     * @return string
     */
    public function getItemId()
    {
        return $this->itemId;
    }

    /**
     * @param string $itemId
     * @return Question
     */
    public function setItemId($id)
    {
        $this->itemId = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getSellerId()
    {
        return $this->sellerId;
    }

    /**
     * @param string $sellerId
     * @return Question
     */
    public function setSellerId($id)
    {
        $this->sellerId = $id;
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
     * @return Question
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return Question
     */
    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return From
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param From $from
     * @return Question
     */
    public function setFrom(From $from)
    {
        $this->from = $from;
        return $this;
    }
}