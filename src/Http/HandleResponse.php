<?php
namespace Dsc\MercadoLivre\Http;

use Dsc\MercadoLivre\Codec\SerializerInterface;
use Dsc\MercadoLivre\Codec\TargetSerializerInterface;
use Psr\Http\Message\StreamInterface;

class HandleResponse
{
    /**
     * @var StreamInterface
     */
    private $stream;

    /**
     * @var TargetSerializerInterface
     */
    private $target;

    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * HandleResponse constructor.
     * @param StreamInterface $stream
     * @param TargetSerializerInterface $targetSerializer
     * @param SerializerInterface $serializer
     */
    public function __construct(StreamInterface $stream, TargetSerializerInterface $targetSerializer, SerializerInterface $serializer)
    {
        $this->stream = $stream;
        $this->target = $targetSerializer;
        $this->serializer = $serializer;
    }

    public function __invoke()
    {
        return $this->stream->getContents();
    }

    public function response()
    {
        return $this->stream->getContents();
    }

    public function handle()
    {
        return $this->serializer->deserialize($this->stream->getContents(), $this->target->getTarget());
    }
}