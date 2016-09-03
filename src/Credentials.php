<?php
namespace Dsc\MercadoLivre;

/**
 * @author Diego Wagner <diegowagner4@gmail.com>
 */
class Credentials
{
    /**
     * @var string
     */
    protected $meli;

    /**
     * @var string
     */
    protected $siteId;

    /**
     * @var string
     */
    protected $accessToken;

    /**
     * @var string
     */
    protected $refreshToken;

    /**
     * Credentials constructor.
     * @param MeliInterface $meli
     * @param string $siteId
     * @param string|null $accessToken
     * @param string|null $refreshToken
     */
    public function __construct(MeliInterface $meli, $siteId, $accessToken = null, $refreshToken = null)
    {
        $this->meli         = $meli;
        $this->siteId       = $siteId;
        $this->accessToken  = $accessToken;
        $this->refreshToken = $refreshToken;
    }

    /**
     * @return MeliInterface|string
     */
    public function getMeli()
    {
        return $this->meli;
    }

    /**
     * @return Environment
     */
    public function getEnvironment()
    {
        return $this->meli->getEnvironment();
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
     */
    public function setSiteId($siteId)
    {
        $this->siteId = $siteId;
    }

    /**
     * @return string
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * @param string $accessToken
     */
    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;
    }

    /**
     * @return string
     */
    public function getRefreshToken()
    {
        return $this->refreshToken;
    }

    /**
     * @param string $refreshToken
     */
    public function setRefreshToken($refreshToken)
    {
        $this->refreshToken = $refreshToken;
    }
}