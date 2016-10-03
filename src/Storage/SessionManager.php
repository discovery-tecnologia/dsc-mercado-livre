<?php
namespace Dsc\MercadoLivre\Storage;

class SessionManager implements StorageInterface
{
    /**
     * @var string
     */
    private $sessionId;

    /**
     * @var string
     */
    private $prefix = 'dsc.meli.';

    public function __construct()
    {
        if (session_status() != PHP_SESSION_ACTIVE && ! headers_sent()) {
            $sessionId = session_id();
            if(empty($sessionId)) {
                session_start();
                $sessionId = session_id();
            }
            $this->sessionId = $sessionId;
        }
    }

    /**
     * @param $name
     * @param $value
     * @return $this
     */
    public function set($name, $value)
    {
        if(! empty($name)) {
            $fullName = $this->getFullName($name);
            if(isset($_SESSION[$fullName])) {
                unset($_SESSION[$fullName]);
            }
            $_SESSION[$fullName] = $value;
        }
        return $this;
    }

    /**
     * @param $name
     * @return bool
     */
    public function has($name)
    {
        if(! empty($name) && isset($_SESSION[$this->getFullName($name)])) {
            return true;
        }
        return false;
    }

    /**
     * @param $name
     * @return bool|string
     */
    public function get($name)
    {
        if(! empty($name) && $this->has($name)) {
            return $_SESSION[$this->getFullName($name)];
        }
        return false;
    }

    /**
     * @param $name
     * @return $this
     */
    public function remove($name)
    {
        if(! empty($name) && $this->has($name)) {
            unset($_SESSION[$this->getFullName($name)]);
        }
        return $this;
    }

    /**
     * @param $name
     * @return string
     */
    private function getFullName($name)
    {
        return $this->prefix . $name;
    }

    /**
     * @return string
     */
    public function getSessionId()
    {
        return $this->sessionId;
    }

    /**
     * @param string $prefix
     * @return $this
     */
    public function setPrefix($prefix='dsc.meli.')
    {
        if(!empty($prefix)) {
            $this->prefix = $prefix;
        }
        return $this;
    }
}