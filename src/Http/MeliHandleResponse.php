<?php
/**
 * Class MeliHandleResponse
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Http;

use Dsc\MercadoLivre\Parser\SerializerInterface;
use Dsc\MercadoLivre\Parser\TargetSerializerInterface;
use Psr\Http\Message\StreamInterface;

class MeliHandleResponse implements MeliHandleResponseInterface
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

    /**
     * @return string
     */
    public function response()
    {
        return $this->stream->getContents();
    }

    /**
     * @return mixed
     */
    public function handle()
    {
        return $this->serializer->deserialize($this->stream->getContents(), $this->target->getTarget());
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->stream->getContents();
    }

    /**
     * @return string
     */
    public function __invoke()
    {
        return $this->stream->getContents();
    }
}