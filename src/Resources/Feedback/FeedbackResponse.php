<?php

/**
 * Class FeedbackResponse
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */

namespace Dsc\MercadoLivre\Resources\Feedback;

use JMS\Serializer\Annotation as JMS;

class FeedbackResponse
{
    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $id;

    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $custFrom;

    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $custTo;

    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $orderId;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $siteId;

    /**
     * @var boolean
     * @JMS\Type("boolean")
     */
    private $fulfilled;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $message;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $rating;

    /**
     * @var \DateTime
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s.u+'>")
    */
    private $dateCreated;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $custRole;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $status;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $reason;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $replyStatus;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $visibilityDate;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $reply;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $replyDate;

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param integer $id
     * @return FeedbackResponse
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return integer
     */
    public function getCustFrom()
    {
        return $this->custFrom;
    }

    /**
     * @param integer $custFrom
     * @return FeedbackResponse
     */
    public function setCustFrom($custFrom)
    {
        $this->custFrom = $custFrom;
        return $this;
    }

    /**
     * @return integer
     */
    public function getCustTo()
    {
        return $this->custTo;
    }

    /**
     * @param integer $custTo
     * @return FeedbackResponse
     */
    public function setCustTo($custTo)
    {
        $this->custTo = $custTo;
        return $this;
    }

    /**
     * @return integer
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * @param integer $orderId
     * @return FeedbackResponse
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
        return $this;
    }

    /**
     * @return string
     */
    public function getSiteId()
    {
        return $this->siteId;
    }

    /**
     * @param string $siteId
     * @return FeedbackResponse
     */
    public function setSiteId($siteId)
    {
        $this->siteId = $siteId;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getFulfilled()
    {
        return $this->fulfilled;
    }

    /**
     * @param boolean $fulfilled
     * @return FeedbackResponse
     */
    public function setFulfilled($fulfilled)
    {
        $this->fulfilled = $fulfilled;
        return $this;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     * @return FeedbackResponse
     */
    public function setMessage($message)
    {
        $this->message = $message;
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
     * @return FeedbackResponse
     */
    public function setRating($rating)
    {
        $this->rating = $rating;
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
     * @return FeedbackResponse
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustRole()
    {
        return $this->custRole;
    }

    /**
     * @param string $custRole
     * @return FeedbackResponse
     */
    public function setCustRole($custRole)
    {
        $this->custRole = $custRole;
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
     * @return FeedbackResponse
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * @param string $reason
     * @return FeedbackResponse
     */
    public function setReason($reason)
    {
        $this->reason = $reason;
        return $this;
    }

    /**
     * @return string
     */
    public function getReplyStatus()
    {
        return $this->replyStatus;
    }

    /**
     * @param string $replyStatus
     * @return FeedbackResponse
     */
    public function setReplyStatus($replyStatus)
    {
        $this->replyStatus = $replyStatus;
        return $this;
    }

    /**
     * @return string
     */
    public function getVisibilityDate()
    {
        return $this->visibilityDate;
    }

    /**
     * @param string $visibilityDate
     * @return FeedbackResponse
     */
    public function setVisibilityDate($visibilityDate)
    {
        $this->visibilityDate = $visibilityDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getReply()
    {
        return $this->reply;
    }

    /**
     * @param string $reply
     * @return FeedbackResponse
     */
    public function setReply($reply)
    {
        $this->reply = $reply;
        return $this;
    }

    /**
     * @return string
     */
    public function getReplyDate()
    {
        return $this->replyDate;
    }

    /**
     * @param string $replyDate
     * @return FeedbackResponse
     */
    public function setReplyDate($replyDate)
    {
        $this->replyDate = $replyDate;
        return $this;
    }
}
