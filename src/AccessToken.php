<?php
namespace Dsc\MercadoLivre;

use Dsc\MercadoLivre\Storage\SessionManager;
use Dsc\MercadoLivre\Storage\StorageInterface;

class AccessToken
{
    const TOKEN         = 'token';
    const REFRESH_TOKEN = 'refresh_token';
    const EXPIRE_IN     = 'expire_in';

    /**
     * @var StorageInterface
     */
    private $storage;

    public function __construct(StorageInterface $storage = null)
    {
        $this->storage = $storage ? $storage : new SessionManager();
    }

    /**
     * @return string|bool
     */
    public function getToken()
    {
        return $this->storage->get(static::TOKEN);
    }

    /**
     * @param string $token
     */
    public function setToken($token)
    {
        $this->storage->set(static::TOKEN, $token);
    }

    /**
     * @return string
     */
    public function getRefreshToken()
    {
        return $this->storage->get(static::REFRESH_TOKEN);
    }

    /**
     * @param string $refreshToken
     */
    public function setRefreshToken($refreshToken)
    {
        $this->storage->set(static::REFRESH_TOKEN, $refreshToken);
    }

    /**
     * @return int
     */
    public function getExpireIn()
    {
        return $this->storage->get(static::EXPIRE_IN);
    }

    /**
     * @param int $expireIn
     */
    public function setExpireIn($expireIn)
    {
        $this->storage->set(static::EXPIRE_IN, time() + $expireIn);
    }

    /**
     * @return bool
     */
    public function isExpired()
    {
        if($this->storage->has(static::EXPIRE_IN) &&
            $this->storage->get(static::EXPIRE_IN) >= time()) {
            return false;
        }
        return true;
    }

    /**
     * @return bool
     */
    public function isValid()
    {
        if(! $this->getToken() || $this->isExpired()) {
            return false;
        }
        return true;
    }
}