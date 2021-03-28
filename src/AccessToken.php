<?php
namespace Dsc\MercadoLivre;

use Dsc\MercadoLivre\Storage\SessionManager;
use Dsc\MercadoLivre\Storage\StorageInterface;

class AccessToken
{
    const TOKEN         = 'token_';
    const REFRESH_TOKEN = 'refresh_token_';
    const EXPIRE_IN     = 'expire_in_';

    /**
     * @var StorageInterface
     */
    private $storage;

    /**
     * @var string
     */
    private $key;

    /**
     * @param StorageInterface $storage
     * @param string $tenant
     */
    public function __construct(StorageInterface $storage = null, $key = null)
    {
        $this->storage = $storage ? $storage : new SessionManager();
        $this->key = $key ? sha1($key) : '';
    }

    /**
     * @return string|bool
     */
    public function getToken()
    {
        return $this->storage->get(static::TOKEN.$this->key);
    }

    /**
     * @param string $token
     */
    public function setToken($token)
    {
        $this->storage->set(static::TOKEN.$this->key, $token);
    }

    /**
     * @return string
     */
    public function getRefreshToken()
    {
        return $this->storage->get(static::REFRESH_TOKEN.$this->key);
    }

    /**
     * @param string $refreshToken
     */
    public function setRefreshToken($refreshToken)
    {
        $this->storage->set(static::REFRESH_TOKEN.$this->key, $refreshToken);
    }

    /**
     * @return int
     */
    public function getExpireIn()
    {
        return $this->storage->get(static::EXPIRE_IN.$this->key);
    }

    /**
     * @param int $expireIn
     */
    public function setExpireIn($expireIn)
    {
        $this->storage->set(static::EXPIRE_IN.$this->key, time() + $expireIn);
    }

    /**
     * @return bool
     */
    public function isExpired()
    {
        if($this->storage->has(static::EXPIRE_IN.$this->key) &&
            $this->storage->get(static::EXPIRE_IN.$this->key) >= time()) {
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