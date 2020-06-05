<?php

/**
 * Class MessageDate
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */

namespace Dsc\MercadoLivre\Resources\Message;

use JMS\Serializer\Annotation as JMS;

class MessageDate
{
    /**
     * @var \DateTime
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s.uZ'>")
     */
    private $received;

    /**
     * @var \DateTime
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s.uZ'>")
     */
    private $available;

    /**
     * @var \DateTime
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s.uZ'>")
     */
    private $notified;

    /**
     * @var \DateTime
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s.uZ'>")
     */
    private $created;

    /**
     * @var \DateTime
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s.uZ'>")
     */
    private $read;

    /**
     * @return \DateTime
     */
    public function getReceived()
    {
        return $this->received;
    }

    /**
     * @param \DateTime $received
     * @return MessageDate
     */
    public function setReceived($received)
    {
        $this->received = $received;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getAvailable()
    {
        return $this->available;
    }

    /**
     * @param \DateTime $available
     * @return MessageDate
     */
    public function setAvailable($available)
    {
        $this->available = $available;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getNotified()
    {
        return $this->notified;
    }

    /**
     * @param \DateTime $notified
     * @return MessageDate
     */
    public function setNotified($notified)
    {
        $this->notified = $notified;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param \DateTime $created
     * @return MessageDate
     */
    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getRead()
    {
        return $this->read;
    }

    /**
     * @param \DateTime $read
     * @return MessageDate
     */
    public function setRead($read)
    {
        $this->read = $read;
        return $this;
    }
}
