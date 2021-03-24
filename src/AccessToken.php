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
    private $tenant;

    /**
     * @param StorageInterface $storage
     * @param string $tenant
     */
    public function __construct(StorageInterface $storage = null, $tenant = null)
    {
        $this->storage = $storage ? $storage : new SessionManager();
        $this->tenant  = $tenant;
    }

    /**
     * @return string|bool
     */
    public function getToken()
    {
        return $this->storage->get(static::TOKEN.$this->tenant);
    }

    /**
     * @param string $token
     */
    public function setToken($token)
    {
        $this->storage->set(static::TOKEN.$this->tenant, $token);
    }

    /**
     * @return string
     */
    public function getRefreshToken()
    {
        return $this->storage->get(static::REFRESH_TOKEN.$this->tenant);
    }

    /**
     * @param string $refreshToken
     */
    public function setRefreshToken($refreshToken)
    {
        $this->storage->set(static::REFRESH_TOKEN.$this->tenant, $refreshToken);
    }

    /**
     * @return int
     */
    public function getExpireIn()
    {
        return $this->storage->get(static::EXPIRE_IN.$this->tenant);
    }

    /**
     * @param int $expireIn
     */
    public function setExpireIn($expireIn)
    {
        $this->storage->set(static::EXPIRE_IN.$this->tenant, time() + $expireIn);
    }

    /**
     * @return bool
     */
    public function isExpired()
    {
        if($this->storage->has(static::EXPIRE_IN.$this->tenant) &&
            $this->storage->get(static::EXPIRE_IN.$this->tenant) >= time()) {
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