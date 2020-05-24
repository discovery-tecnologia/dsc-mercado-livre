<?php
/**
 * Class Payer
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Resources\Payment;

use JMS\Serializer\Annotation as JMS;

class Payer
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
    private $email;

    /**
     * @var PayerPhone
     * @JMS\Type("Dsc\MercadoLivre\Resources\Payment\PayerPhone")
     */
    private $phone;

    /**
     * @var PayerIdentification
     * @JMS\Type("Dsc\MercadoLivre\Resources\Payment\PayerIdentification")
     */
    private $identification;

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param integer $id
     * @return Payer
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Payer
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return PayerPhone
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param PayerPhone $phone
     * @return Payer
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return PayerIdentification
     */
    public function getIdentification()
    {
        return $this->identification;
    }

    /**
     * @param PayerIdentification $identification
     * @return Payer
     */
    public function setIdentification($identification)
    {
        $this->identification = $identification;
        return $this;
    }
}
