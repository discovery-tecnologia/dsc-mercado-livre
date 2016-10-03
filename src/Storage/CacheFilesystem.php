<?php
namespace Dsc\MercadoLivre\Storage;

use Doctrine\Common\Cache\FilesystemCache;

class CacheFilesystem extends FilesystemCache implements StorageInterface
{
    /**
     * @param $name
     * @param $value
     * @return $this
     */
    public function set($name, $value)
    {
        $this->set($name, $value);
        return $this;
    }

    /**
     * @param $name
     * @return bool
     */
    public function has($name)
    {
        return $this->contains($name);
    }

    /**
     * @param $name
     * @return false|mixed
     */
    public function get($name)
    {
        return $this->fetch($name);
    }

    /**
     * @param $name
     * @return $this
     */
    public function remove($name)
    {
        $this->remove($name);
        return $this;
    }
}