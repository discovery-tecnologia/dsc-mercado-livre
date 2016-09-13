<?php
namespace Dsc\MercadoLivre\Authorization;

use Dsc\MercadoLivre\Http\Request;
use Dsc\MercadoLivre\Http\RequestInterface;

class AuthorizationRequest extends Request implements RequestInterface
{
    /**
     * @var string
     */
    protected $grantType;

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
    protected $code;

    /**
     * @var string
     */
    protected $redirectUri;

    /**
     * @var string
     */
    protected $refreshToken;

    /**
     * @param mixed $grantType
     * @return AuthorizationRequest
     */
    public function setGrantType($grantType)
    {
        $this->grantType = $grantType;
        return $this;
    }

    /**
     * @param mixed $clientId
     * @return AuthorizationRequest
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
        return $this;
    }

    /**
     * @param mixed $clientSecret
     * @return AuthorizationRequest
     */
    public function setClientSecret($clientSecret)
    {
        $this->clientSecret = $clientSecret;
        return $this;
    }

    /**
     * @param mixed $code
     * @return AuthorizationRequest
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @param mixed $redirectUri
     * @return AuthorizationRequest
     */
    public function setRedirectUri($redirectUri)
    {
        $this->redirectUri = $redirectUri;
        return $this;
    }

    /**
     * @param mixed $refreshToken
     * @return AuthorizationRequest
     */
    public function setRefreshToken($refreshToken)
    {
        $this->refreshToken = $refreshToken;
        return $this;
    }
}