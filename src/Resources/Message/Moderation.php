<?php

/**
 * Class Moderation
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */

namespace Dsc\MercadoLivre\Resources\Message;

use JMS\Serializer\Annotation as JMS;

class Moderation
{
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
    private $source;

    /**
     * @var \DateTime
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s.uZ'>")
     */
    private $moderationDate;

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return MessageModeration
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
     * @return MessageModeration
     */
    public function setReason($reason)
    {
        $this->reason = $reason;
        return $this;
    }

    /**
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param string $source
     * @return MessageModeration
     */
    public function setSource($source)
    {
        $this->source = $source;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getModerationDate()
    {
        return $this->moderationDate;
    }

    /**
     * @param \DateTime $moderationDate
     * @return MessageModeration
     */
    public function setModerationDate($moderationDate)
    {
        $this->moderationDate = $moderationDate;
        return $this;
    }
}
