<?php
namespace Dsc\MercadoLivre;

use Doctrine\Common\Annotations\AnnotationRegistry;
use Doctrine\Common\Cache\Cache;
use Doctrine\Common\Cache\FilesystemCache;

class Configuration
{
    /**
     * @var FilesystemCache
     */
    protected $cache;

    /**
     * Configuration constructor.
     * @param Cache $cache
     */
    public function __construct(Cache $cache = null)
    {
        AnnotationRegistry::registerLoader('class_exists');
        $this->cache = $cache ?: new FilesystemCache(sys_get_temp_dir());
    }

    /**
     * @return FilesystemCache
     */
    public function getCache()
    {
        return $this->cache;
    }

    /**
     * @param Cache $cache
     */
    public function setCache(Cache $cache)
    {
        $this->cache = $cache;
    }
}