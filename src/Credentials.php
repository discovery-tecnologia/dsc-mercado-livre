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
    protected $clientId;

    /**
     * @var string
     */
    protected $clientSecret;

    /**
     * @var string
     */
    protected $accessToken;

    /**
     * @var bool
     */
    protected $refreshToken;

    public function __construct($clientId, $clientSecret, $accessToken = null, $refreshToken = null)
    {
        $this->clientId     = $clientId;
        $this->clientSecret = $clientSecret;
        $this->accessToken  = $accessToken;
        $this->refreshToken = $refreshToken;
    }
}