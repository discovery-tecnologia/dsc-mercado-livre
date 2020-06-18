<?php

/**
 * Class FeedbackPost
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */

namespace Dsc\MercadoLivre\Resources\Feedback;

use JMS\Serializer\Annotation as JMS;

class FeedbackPost
{
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
     * @var string
     * @JMS\Type("string")
     */
    private $reason;

    /**
     * @var boolean
     * @JMS\Type("boolean")
     */
    private $restockItem;

    /**
     * @return boolean
     */
    public function getFulfilled()
    {
        return $this->fulfilled;
    }

    /**
     * @param boolean $fulfilled
     * @return FeedbackPost
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
     * @return FeedbackPost
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
     * @return FeedbackPost
     */
    public function setRating($rating)
    {
        $this->rating = $rating;
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
     * @return FeedbackPost
     */
    public function setReason($reason)
    {
        $this->reason = $reason;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getRestockItem()
    {
        return $this->restockItem;
    }

    /**
     * @param boolean $restockItem
     * @return FeedbackPost
     */
    public function setRestockItem($restockItem)
    {
        $this->restockItem = $restockItem;
        return $this;
    }
}
