<?php
/**
 * Class Buyer
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Resources\Buyer;

use JMS\Serializer\Annotation as JMS;

class Buyer
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
    private $nickname;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $email;

    /**
     * @var Phone
     * @JMS\Type("Dsc\MercadoLivre\Resources\Buyer\Phone")
     */
    private $phone;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $firstName;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $lastName;

    /**
     * @var BillingInfo
     * @JMS\Type("Dsc\MercadoLivre\Resources\Buyer\BillingInfo")
     */
    private $billingInfo;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Buyer
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * @param string $nickname
     * @return Buyer
     */
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;
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
     * @return Buyer
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return Phone
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param Phone $phone
     * @return Buyer
     */
    public function setPhone(Phone $phone)
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return Buyer
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return Buyer
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return BillingInfo
     */
    public function getBillingInfo()
    {
        return $this->billingInfo;
    }

    /**
     * @param BillingInfo $billingInfo
     * @return Buyer
     */
    public function setBillingInfo(BillingInfo $billingInfo)
    {
        $this->billingInfo = $billingInfo;
        return $this;
    }
}