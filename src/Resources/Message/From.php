<?php

/**
 * Class From
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */

namespace Dsc\MercadoLivre\Resources\Message;

use JMS\Serializer\Annotation as JMS;

class From
{
    /**
     * @var int
     * @JMS\Type("integer")
     */
    private $userId;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $email;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $name;

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     * @return From
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
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
     * @return From
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return From
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}
