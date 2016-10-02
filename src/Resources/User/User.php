<?php
/**
 * Class User
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Resources\User;

use JMS\Serializer\Annotation as JMS;

class User
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
    private $registrationDate;

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
     * @var string
     * @JMS\Type("string")
     */
    private $countryId;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $email;

    /**
     * @var Identification
     * @JMS\Type("Dsc\MercadoLivre\Resources\User\Identification")
     */
    private $identification;

    /**
     * @var Address
     * @JMS\Type("Dsc\MercadoLivre\Resources\User\Address")
     */
    private $address;

    /**
     * @var Phone
     * @JMS\Type("Dsc\MercadoLivre\Resources\User\Phone")
     */
    private $phone;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $userType;

    /**
     * @var array
     * @JMS\Type("array")
     */
    private $tags;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $logo;

    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $points;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $siteId;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $permalink;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return User
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
     * @return User
     */
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;
        return $this;
    }

    /**
     * @return string
     */
    public function getRegistrationDate()
    {
        return $this->registrationDate;
    }

    /**
     * @param string $registrationDate
     * @return User
     */
    public function setRegistrationDate($registrationDate)
    {
        $this->registrationDate = $registrationDate;
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
     * @return User
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
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountryId()
    {
        return $this->countryId;
    }

    /**
     * @param string $countryId
     * @return User
     */
    public function setCountryId($countryId)
    {
        $this->countryId = $countryId;
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
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return Identification
     */
    public function getIdentification()
    {
        return $this->identification;
    }

    /**
     * @param Identification $identification
     * @return User
     */
    public function setIdentification($identification)
    {
        $this->identification = $identification;
        return $this;
    }

    /**
     * @return Address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param Address $address
     * @return User
     */
    public function setAddress($address)
    {
        $this->address = $address;
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
     * @return User
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
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
     * @return User
     */
    public function setUserType($userType)
    {
        $this->userType = $userType;
        return $this;
    }

    /**
     * @return array
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param array $tags
     * @return User
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
        return $this;
    }

    /**
     * @return string
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * @param string $logo
     * @return User
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;
        return $this;
    }

    /**
     * @return int
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * @param int $points
     * @return User
     */
    public function setPoints($points)
    {
        $this->points = $points;
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
     * @return User
     */
    public function setSiteId($siteId)
    {
        $this->siteId = $siteId;
        return $this;
    }

    /**
     * @return string
     */
    public function getPermalink()
    {
        return $this->permalink;
    }

    /**
     * @param string $permalink
     * @return User
     */
    public function setPermalink($permalink)
    {
        $this->permalink = $permalink;
        return $this;
    }
}