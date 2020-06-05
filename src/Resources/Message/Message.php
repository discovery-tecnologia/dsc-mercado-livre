<?php

/**
 * Class Message
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */

namespace Dsc\MercadoLivre\Resources\Message;

use JMS\Serializer\Annotation as JMS;

class Message
{
    /**
     * @var From
     * @JMS\Type("Dsc\MercadoLivre\Resources\Message\From")
     */
    private $from;

    /**
     * @var To
     * @JMS\Type("Dsc\MercadoLivre\Resources\Message\To")
     */
    private $to;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $text;

    /**
     * @var array
     * @JMS\Type("array")
     */
    private $attachments;

    /**
     * @return From
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param From $from
     * @return Message
     */
    public function setFrom($from)
    {
        $this->from = $from;
        return $this;
    }

    /**
     * @return To
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @param To $to
     * @return Message
     */
    public function setTo($to)
    {
        $this->to = $to;
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
     * @return Message
     */
    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return array
     */
    public function getAttachments()
    {
        return $this->attachments;
    }

    /**
     * @param array $attachments
     * @return Message
     */
    public function setAttachments($attachments)
    {
        $this->attachments = $attachments;
        return $this;
    }
}
