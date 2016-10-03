<?php
namespace Dsc\MercadoLivre;

use Doctrine\Common\Annotations\AnnotationRegistry;
use Dsc\MercadoLivre\Parser\ParserSerializer;
use Dsc\MercadoLivre\Parser\SerializerInterface;
use Dsc\MercadoLivre\Storage\SessionManager;
use Dsc\MercadoLivre\Storage\StorageInterface;

final class Configuration
{
    /**
     * @var StorageInterface
     */
    protected $storage;

    /**
     * @var SerializerInterface
     */
    protected $serializer;

    /**
     * Configuration constructor.
     * @param SerializerInterface|null $serializer
     * @param StorageInterface|null $storage
     */
    public function __construct(SerializerInterface $serializer = null, StorageInterface $storage = null)
    {
        AnnotationRegistry::registerLoader('class_exists');
        $this->serializer  = $serializer ?: new ParserSerializer();
        $this->storage     = $storage ?: new SessionManager();
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
     * @return $this
     */
    public function setSerializer(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
        return $this;
    }

    /**
     * @return StorageInterface
     */
    public function getStorage()
    {
        return $this->storage;
    }

    /**
     * @param StorageInterface $storage
     * @return Configuration
     */
    public function setStorage($storage)
    {
        $this->storage = $storage;
        return $this;
    }
}