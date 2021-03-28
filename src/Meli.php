<?php
namespace Dsc\MercadoLivre;
use Dsc\MercadoLivre\Environments\Production;

/**
 * @author Diego Wagner <diegowagner4@gmail.com>
 */
class Meli implements MeliInterface
{
    /**
     * @var string
     */
    protected $clientId;

    /**
     * @var string
     */
    protected $clientSecret;

    /**
     * @var string
     */
    protected $userId;

    /**
     * @var Environment
     */
    protected $environment;

    public function __construct($clientId, $clientSecret, Environment $environment = null)
    {
        $this->clientId     = $clientId;
        $this->clientSecret = $clientSecret;
        $this->environment  = $environment ?: new Production();
    }

    /**
     * @return string
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * @param string $clientId
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
    }

    /**
     * @return string
     */
    public function getClientSecret()
    {
        return $this->clientSecret;
    }

    /**
     * @param string $clientSecret
     */
    public function setClientSecret($clientSecret)
    {
        $this->clientSecret = $clientSecret;
    }

    /**
     * @return string
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param string $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return string
     */
    public function getTenantId()
    {
        return $this->clientId . $this->userId;
    }

    /**
     * @return Environment
     */
    public function getEnvironment()
    {
        return $this->environment;
    }

    /**
     * @param Environment $environment
     */
    public function setEnvironment(Environment $environment)
    {
        $this->environment = $environment;
    }
}