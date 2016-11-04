<?php
/**
 * Class ResponseBuilder
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Http;

use Dsc\MercadoLivre\Parser\SerializerInterface;
use Psr\Http\Message\StreamInterface;

class ResponseBuilder
{
    /**
     * @var StreamInterface
     */
    protected $response;

    /**
     * @var string
     */
    protected $target;

    /**
     * @var SerializerInterface
     */
    protected $serializer;

    /**
     * ResponseBuilder constructor.
     * @param StreamInterface $response
     * @param string $target
     * @param SerializerInterface $serializer
     */
    public function __construct(StreamInterface $response, $target, SerializerInterface $serializer)
    {
        $this->response   = $response;
        $this->target     = $target;
        $this->serializer = $serializer;
    }

    /**
     * @return string
     */
    public function json()
    {
        return $this->response->getContents();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->response->getContents();
    }

    /**
     * @return string
     */
    public function __invoke()
    {
        return $this->response->getContents();
    }

    /**
     * @return mixed
     */
    public function toObject()
    {
        return $this->serializer->deserialize($this->response->getContents(), $this->target);
    }
}