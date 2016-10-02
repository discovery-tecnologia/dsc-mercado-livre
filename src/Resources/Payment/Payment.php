<?php
/**
 * Class Payment
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Resources\Payment;

use JMS\Serializer\Annotation as JMS;

class Payment
{
    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $id;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $siteId;

    /**
     * @var \DateTime
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s.000-04:00'>")
     */
    private $dateCreated;

    /**
     * @var \DateTime
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s.000-04:00'>")
     */
    private $dateApproved;

    /**
     * @var \DateTime
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s.000-04:00'>")
     */
    private $lastModified;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $sponsorId;

    /**
     * @var Collector
     * @JMS\Type("Dsc\MercadoLivre\Resources\Payment\Collector")
     */
    private $collector;

    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $payerId;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $orderId;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $externalReference;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $merchantOrderId;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $reason;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $currencyId;

    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $transactionAmount;

    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $totalPaidAmount;

    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $shippingCost;

    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $overpaidAmount;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $status;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $statusCode;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $paymentMethodId;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $paymentType;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $financeCharge;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $cardId;

    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $issuerId;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $statementDescriptor;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $firstSixDigits;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $lastFourDigits;

    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $installments;

    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $buyerFee;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $authorizationCode;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $transactionOrderId;

    /**
     * @var boolean
     * @JMS\Type("boolean")
     */
    private $capture;

    /**
     * @var double
     * @JMS\Type("double")
     */
    private $installmentAmount;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $deferredPeriod;

    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $accountMoneyAmount;

    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $cuponAmount;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $cuponId;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $activationUri;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $marketplace;

    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $marketplaceFee;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $operationType;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $paymentMethodReferenceId;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Payment
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
     * @return Payment
     */
    public function setSiteId($siteId)
    {
        $this->siteId = $siteId;
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
     * @return Payment
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateApproved()
    {
        return $this->dateApproved;
    }

    /**
     * @param \DateTime $dateApproved
     * @return Payment
     */
    public function setDateApproved($dateApproved)
    {
        $this->dateApproved = $dateApproved;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getLastModified()
    {
        return $this->lastModified;
    }

    /**
     * @param \DateTime $lastModified
     * @return Payment
     */
    public function setLastModified($lastModified)
    {
        $this->lastModified = $lastModified;
        return $this;
    }

    /**
     * @return string
     */
    public function getSponsorId()
    {
        return $this->sponsorId;
    }

    /**
     * @param string $sponsorId
     * @return Payment
     */
    public function setSponsorId($sponsorId)
    {
        $this->sponsorId = $sponsorId;
        return $this;
    }

    /**
     * @return Collector
     */
    public function getCollector()
    {
        return $this->collector;
    }

    /**
     * @param Collector $collector
     * @return Payment
     */
    public function setCollector(Collector $collector)
    {
        $this->collector = $collector;
        return $this;
    }

    /**
     * @return int
     */
    public function getPayerId()
    {
        return $this->payerId;
    }

    /**
     * @param int $payerId
     * @return Payment
     */
    public function setPayerId($payerId)
    {
        $this->payerId = $payerId;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * @param string $orderId
     * @return Payment
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
        return $this;
    }

    /**
     * @return string
     */
    public function getExternalReference()
    {
        return $this->externalReference;
    }

    /**
     * @param string $externalReference
     * @return Payment
     */
    public function setExternalReference($externalReference)
    {
        $this->externalReference = $externalReference;
        return $this;
    }

    /**
     * @return string
     */
    public function getMerchantOrderId()
    {
        return $this->merchantOrderId;
    }

    /**
     * @param string $merchantOrderId
     * @return Payment
     */
    public function setMerchantOrderId($merchantOrderId)
    {
        $this->merchantOrderId = $merchantOrderId;
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
     * @return Payment
     */
    public function setReason($reason)
    {
        $this->reason = $reason;
        return $this;
    }

    /**
     * @return string
     */
    public function getCurrencyId()
    {
        return $this->currencyId;
    }

    /**
     * @param string $currencyId
     * @return Payment
     */
    public function setCurrencyId($currencyId)
    {
        $this->currencyId = $currencyId;
        return $this;
    }

    /**
     * @return int
     */
    public function getTransactionAmount()
    {
        return $this->transactionAmount;
    }

    /**
     * @param int $transactionAmount
     * @return Payment
     */
    public function setTransactionAmount($transactionAmount)
    {
        $this->transactionAmount = $transactionAmount;
        return $this;
    }

    /**
     * @return int
     */
    public function getTotalPaidAmount()
    {
        return $this->totalPaidAmount;
    }

    /**
     * @param int $totalPaidAmount
     * @return Payment
     */
    public function setTotalPaidAmount($totalPaidAmount)
    {
        $this->totalPaidAmount = $totalPaidAmount;
        return $this;
    }

    /**
     * @return int
     */
    public function getShippingCost()
    {
        return $this->shippingCost;
    }

    /**
     * @param int $shippingCost
     * @return Payment
     */
    public function setShippingCost($shippingCost)
    {
        $this->shippingCost = $shippingCost;
        return $this;
    }

    /**
     * @return int
     */
    public function getOverpaidAmount()
    {
        return $this->overpaidAmount;
    }

    /**
     * @param int $overpaidAmount
     * @return Payment
     */
    public function setOverpaidAmount($overpaidAmount)
    {
        $this->overpaidAmount = $overpaidAmount;
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
     * @return Payment
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param string $statusCode
     * @return Payment
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getPaymentMethodId()
    {
        return $this->paymentMethodId;
    }

    /**
     * @param string $paymentMethodId
     * @return Payment
     */
    public function setPaymentMethodId($paymentMethodId)
    {
        $this->paymentMethodId = $paymentMethodId;
        return $this;
    }

    /**
     * @return string
     */
    public function getPaymentType()
    {
        return $this->paymentType;
    }

    /**
     * @param string $paymentType
     * @return Payment
     */
    public function setPaymentType($paymentType)
    {
        $this->paymentType = $paymentType;
        return $this;
    }

    /**
     * @return string
     */
    public function getFinanceCharge()
    {
        return $this->financeCharge;
    }

    /**
     * @param string $financeCharge
     * @return Payment
     */
    public function setFinanceCharge($financeCharge)
    {
        $this->financeCharge = $financeCharge;
        return $this;
    }

    /**
     * @return string
     */
    public function getCardId()
    {
        return $this->cardId;
    }

    /**
     * @param string $cardId
     * @return Payment
     */
    public function setCardId($cardId)
    {
        $this->cardId = $cardId;
        return $this;
    }

    /**
     * @return int
     */
    public function getIssuerId()
    {
        return $this->issuerId;
    }

    /**
     * @param int $issuerId
     * @return Payment
     */
    public function setIssuerId($issuerId)
    {
        $this->issuerId = $issuerId;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatementDescriptor()
    {
        return $this->statementDescriptor;
    }

    /**
     * @param string $statementDescriptor
     * @return Payment
     */
    public function setStatementDescriptor($statementDescriptor)
    {
        $this->statementDescriptor = $statementDescriptor;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstSixDigits()
    {
        return $this->firstSixDigits;
    }

    /**
     * @param string $firstSixDigits
     * @return Payment
     */
    public function setFirstSixDigits($firstSixDigits)
    {
        $this->firstSixDigits = $firstSixDigits;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastFourDigits()
    {
        return $this->lastFourDigits;
    }

    /**
     * @param string $lastFourDigits
     * @return Payment
     */
    public function setLastFourDigits($lastFourDigits)
    {
        $this->lastFourDigits = $lastFourDigits;
        return $this;
    }

    /**
     * @return int
     */
    public function getInstallments()
    {
        return $this->installments;
    }

    /**
     * @param int $installments
     * @return Payment
     */
    public function setInstallments($installments)
    {
        $this->installments = $installments;
        return $this;
    }

    /**
     * @return int
     */
    public function getBuyerFee()
    {
        return $this->buyerFee;
    }

    /**
     * @param int $buyerFee
     * @return Payment
     */
    public function setBuyerFee($buyerFee)
    {
        $this->buyerFee = $buyerFee;
        return $this;
    }

    /**
     * @return string
     */
    public function getAuthorizationCode()
    {
        return $this->authorizationCode;
    }

    /**
     * @param string $authorizationCode
     * @return Payment
     */
    public function setAuthorizationCode($authorizationCode)
    {
        $this->authorizationCode = $authorizationCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getTransactionOrderId()
    {
        return $this->transactionOrderId;
    }

    /**
     * @param string $transactionOrderId
     * @return Payment
     */
    public function setTransactionOrderId($transactionOrderId)
    {
        $this->transactionOrderId = $transactionOrderId;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isCapture()
    {
        return $this->capture;
    }

    /**
     * @param boolean $capture
     * @return Payment
     */
    public function setCapture($capture)
    {
        $this->capture = $capture;
        return $this;
    }

    /**
     * @return float
     */
    public function getInstallmentAmount()
    {
        return $this->installmentAmount;
    }

    /**
     * @param float $installmentAmount
     * @return Payment
     */
    public function setInstallmentAmount($installmentAmount)
    {
        $this->installmentAmount = $installmentAmount;
        return $this;
    }

    /**
     * @return string
     */
    public function getDeferredPeriod()
    {
        return $this->deferredPeriod;
    }

    /**
     * @param string $deferredPeriod
     * @return Payment
     */
    public function setDeferredPeriod($deferredPeriod)
    {
        $this->deferredPeriod = $deferredPeriod;
        return $this;
    }

    /**
     * @return int
     */
    public function getAccountMoneyAmount()
    {
        return $this->accountMoneyAmount;
    }

    /**
     * @param int $accountMoneyAmount
     * @return Payment
     */
    public function setAccountMoneyAmount($accountMoneyAmount)
    {
        $this->accountMoneyAmount = $accountMoneyAmount;
        return $this;
    }

    /**
     * @return int
     */
    public function getCuponAmount()
    {
        return $this->cuponAmount;
    }

    /**
     * @param int $cuponAmount
     * @return Payment
     */
    public function setCuponAmount($cuponAmount)
    {
        $this->cuponAmount = $cuponAmount;
        return $this;
    }

    /**
     * @return string
     */
    public function getCuponId()
    {
        return $this->cuponId;
    }

    /**
     * @param string $cuponId
     * @return Payment
     */
    public function setCuponId($cuponId)
    {
        $this->cuponId = $cuponId;
        return $this;
    }

    /**
     * @return string
     */
    public function getActivationUri()
    {
        return $this->activationUri;
    }

    /**
     * @param string $activationUri
     * @return Payment
     */
    public function setActivationUri($activationUri)
    {
        $this->activationUri = $activationUri;
        return $this;
    }

    /**
     * @return string
     */
    public function getMarketplace()
    {
        return $this->marketplace;
    }

    /**
     * @param string $marketplace
     * @return Payment
     */
    public function setMarketplace($marketplace)
    {
        $this->marketplace = $marketplace;
        return $this;
    }

    /**
     * @return int
     */
    public function getMarketplaceFee()
    {
        return $this->marketplaceFee;
    }

    /**
     * @param int $marketplaceFee
     * @return Payment
     */
    public function setMarketplaceFee($marketplaceFee)
    {
        $this->marketplaceFee = $marketplaceFee;
        return $this;
    }

    /**
     * @return string
     */
    public function getOperationType()
    {
        return $this->operationType;
    }

    /**
     * @param string $operationType
     * @return Payment
     */
    public function setOperationType($operationType)
    {
        $this->operationType = $operationType;
        return $this;
    }

    /**
     * @return string
     */
    public function getPaymentMethodReferenceId()
    {
        return $this->paymentMethodReferenceId;
    }

    /**
     * @param string $paymentMethodReferenceId
     * @return Payment
     */
    public function setPaymentMethodReferenceId($paymentMethodReferenceId)
    {
        $this->paymentMethodReferenceId = $paymentMethodReferenceId;
        return $this;
    }
}