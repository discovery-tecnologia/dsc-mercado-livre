<?php

/**
 * Class MessageResponse
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */

namespace Dsc\MercadoLivre\Resources\Message;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as JMS;

class MessageResponse
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
     * @var integer
     * @JMS\Type("integer")
     */
    private $clientId;

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
    private $status;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $subject;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $text;

    /**
     * @var MessageDate
     * @JMS\Type("Dsc\MercadoLivre\Resources\Message\MessageDate")
     */
    private $messageDate;

    /**
     * @var Moderation
     * @JMS\SerializedName("message_moderation")
     * @JMS\Type("Dsc\MercadoLivre\Resources\Message\Moderation")
     */
    private $moderation;

    /**
     * @var array
     * @JMS\SerializedName("message_attachments")
     * @JMS\Type("array")
     */
    private $attachments;

    /**
     * @var ArrayCollection
     * @JMS\SerializedName("message_resources")
     * @JMS\Type("ArrayCollection<Dsc\MercadoLivre\Resources\Message\Resource>")
     */
    private $resources;

    /**
     * @var boolean
     * @JMS\Type("boolean")
     */
    private $conversationFirstMessage;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return MessageResponse
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @return MessageResponse
     */
    public function setSiteId($siteId)
    {
        $this->siteId = $siteId;
        return $this;
    }

    /**
     * @return integer
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * @param integer $clientId
     * @return MessageResponse
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
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
     * @return MessageResponse
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
     * @return MessageResponse
     */
    public function setTo($to)
    {
        $this->to = $to;
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
     * @return MessageResponse
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     * @return MessageResponse
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
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
     * @return MessageResponse
     */
    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return MessageDate
     */
    public function getMessageDate()
    {
        return $this->messageDate;
    }

    /**
     * @param MessageDate $messageDate
     * @return MessageResponse
     */
    public function setMessageDate($messageDate)
    {
        $this->messageDate = $messageDate;
        return $this;
    }

    /**
     * @return Moderation
     */
    public function getModeration()
    {
        return $this->moderation;
    }

    /**
     * @param Moderation $moderation
     * @return MessageResponse
     */
    public function setModeration($moderation)
    {
        $this->moderation = $moderation;
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
     * @return MessageResponse
     */
    public function setAttachments($attachments)
    {
        $this->attachments = $attachments;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getResources()
    {
        return $this->resources;
    }

    /**
     * @param ArrayCollection $resources
     * @return MessageResponse
     */
    public function setResources($resources)
    {
        $this->resources = $resources;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getConversationFirstMessage()
    {
        return $this->conversationFirstMessage;
    }

    /**
     * @param boolean $conversationFirstMessage
     * @return MessageResponse
     */
    public function setConversationFirstMessage($conversationFirstMessage)
    {
        $this->conversationFirstMessage = $conversationFirstMessage;
        return $this;
    }
}
