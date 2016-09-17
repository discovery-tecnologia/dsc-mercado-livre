<?php
namespace Dsc\MercadoLivre;

use Doctrine\Common\Annotations\AnnotationRegistry;
use Doctrine\Common\Cache\Cache;
use Doctrine\Common\Cache\FilesystemCache;
use Dsc\MercadoLivre\Codec\ParserSerializer;
use Dsc\MercadoLivre\Codec\SerializerInterface;

final class Configuration
{
    /**
     * @var FilesystemCache
     */
    protected $cache;

    /**
     * @var SerializerInterface
     */
    protected $serializer;

    /**
     * Configuration constructor.
     * @param SerializerInterface|null $serializer
     * @param Cache|null $cache
     */
    public function __construct(SerializerInterface $serializer = null, Cache $cache = null)
    {
        AnnotationRegistry::registerLoader('class_exists');
        $this->serializer  = $serializer ?: new ParserSerializer();
        $this->cache       = $cache ?: new FilesystemCache(sys_get_temp_dir());
    }

    /**
     * @return SerializerInterface
     */
    public function getSerializer()
    {
        return $this->serializer;
    }

    /**
     * @param SerializerInterface $serializer
     */
    public function setSerializer(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
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