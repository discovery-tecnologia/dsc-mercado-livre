<?php
/**
 * Class Status
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Resources\User;

use JMS\Serializer\Annotation as JMS;

class Status
{
    /**
     * @var string
     * @JMS\Type("string")
     */
    private $siteStatus;

    /**
     * @var boolean
     * @JMS\Type("boolean")
     */
    private $mercadopagoTcAccepted;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $mercadopagoAccountType;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $mercadoenvios;

    /**
     * @var boolean
     * @JMS\Type("boolean")
     */
    private $immediatePayment;

    /**
     * @var boolean
     * @JMS\Type("boolean")
     */
    private $confirmedEmail;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $userType;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $requiredAction;

    /**
     * @return string
     */
    public function getSiteStatus()
    {
        return $this->siteStatus;
    }

    /**
     * @param string $siteStatus
     * @return Status
     */
    public function setSiteStatus($siteStatus)
    {
        $this->siteStatus = $siteStatus;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isMercadopagoTcAccepted()
    {
        return $this->mercadopagoTcAccepted;
    }

    /**
     * @param boolean $mercadopagoTcAccepted
     * @return Status
     */
    public function setMercadopagoTcAccepted($mercadopagoTcAccepted)
    {
        $this->mercadopagoTcAccepted = $mercadopagoTcAccepted;
        return $this;
    }

    /**
     * @return string
     */
    public function getMercadopagoAccountType()
    {
        return $this->mercadopagoAccountType;
    }

    /**
     * @param string $mercadopagoAccountType
     * @return Status
     */
    public function setMercadopagoAccountType($mercadopagoAccountType)
    {
        $this->mercadopagoAccountType = $mercadopagoAccountType;
        return $this;
    }

    /**
     * @return string
     */
    public function getMercadoenvios()
    {
        return $this->mercadoenvios;
    }

    /**
     * @param string $mercadoenvios
     * @return Status
     */
    public function setMercadoenvios($mercadoenvios)
    {
        $this->mercadoenvios = $mercadoenvios;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isImmediatePayment()
    {
        return $this->immediatePayment;
    }

    /**
     * @param boolean $immediatePayment
     * @return Status
     */
    public function setImmediatePayment($immediatePayment)
    {
        $this->immediatePayment = $immediatePayment;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isConfirmedEmail()
    {
        return $this->confirmedEmail;
    }

    /**
     * @param boolean $confirmedEmail
     * @return Status
     */
    public function setConfirmedEmail($confirmedEmail)
    {
        $this->confirmedEmail = $confirmedEmail;
        return $this;
    }

    /**
     * @return string
     */
    public function getUserType()
    {
        return $this->userType;
    }

    /**
     * @param string $userType
     * @return Status
     */
    public function setUserType($userType)
    {
        $this->userType = $userType;
        return $this;
    }

    /**
     * @return string
     */
    public function getRequiredAction()
    {
        return $this->requiredAction;
    }

    /**
     * @param string $requiredAction
     * @return Status
     */
    public function setRequiredAction($requiredAction)
    {
        $this->requiredAction = $requiredAction;
        return $this;
    }
}