<?php
/**
 * Class BillingInfo
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Resources\Buyer;

use JMS\Serializer\Annotation as JMS;

class BillingInfo
{
    /**
     * @var string
     * @JMS\Type("string")
     */
    private $docType;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $docNumber;

    /**
     * @return string
     */
    public function getDocType()
    {
        return $this->docType;
    }

    /**
     * @param string $docType
     * @return BillingInfo
     */
    public function setDocType($docType)
    {
        $this->docType = $docType;
        return $this;
    }

    /**
     * @return string
     */
    public function getDocNumber()
    {
        return $this->docNumber;
    }

    /**
     * @param string $docNumber
     * @return BillingInfo
     */
    public function setDocNumber($docNumber)
    {
        $this->docNumber = $docNumber;
        return $this;
    }
}