<?php
/**
 * Class ResponseBuilder
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Http;

use Dsc\MercadoLivre\Parser\ParserSerializer;
use Dsc\MercadoLivre\Parser\SerializerInterface;

abstract class ResponseBuilder
{
    /**
     * @var mixed
     */
    protected $response;

    /**
     * @var ParserSerializer
     */
    protected $serializer;

    /**
     * ResponseBuilder constructor.
     * @param $response
     * @param SerializerInterface $serializer
     */
    public function __construct($response, SerializerInterface $serializer)
    {
        $this->response   = $response;
        $this->serializer = $serializer;
    }

    /**
     * @return string
     */
    public function contents()
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
    abstract public function getResponse();
}