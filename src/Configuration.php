<?php
namespace Dsc\MercadoLivre;

use Doctrine\Common\Annotations\AnnotationRegistry;
use Doctrine\Common\Cache\Cache;
use Doctrine\Common\Cache\FilesystemCache;
use Dsc\MercadoLivre\Codec\Formatter;

class Configuration
{
    /**
     * @var FilesystemCache
     */
    protected $cache;

    /**
     * @var string
     */
    protected $formatter;

    /**
     * Configuration constructor.
     * @param Cache $cache
     */
    public function __construct(Cache $cache = null, $formatter = null)
    {
        AnnotationRegistry::registerLoader('class_exists');
        $this->cache = $cache ?: new FilesystemCache(sys_get_temp_dir());
        $this->formatter = $formatter ? $formatter : Formatter::JSON; // A API do Meli só trabalha no formato JSON, mas já deixei a opção
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

    /**
     * @return string
     */
    public function getFormatter()
    {
        return $this->formatter;
    }

    /**
     * @param string $formatter
     */
    public function setFormatter($formatter)
    {
        $this->formatter = $formatter;
    }
}