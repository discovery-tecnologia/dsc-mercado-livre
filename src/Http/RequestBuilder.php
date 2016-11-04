<?php
/**
 * Class RequestBuilder
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Http;

use Dsc\MercadoLivre\Parser\SerializerInterface;

class RequestBuilder
{
    /**
     * @var mixed
     */
    private $data;

    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * RequestBuilder constructor.
     * @param SerializerInterface $serializer
     */
    public function __construct($data, SerializerInterface $serializer)
    {
        $this->data = $data;
        $this->serializer = $serializer;
    }

    /**
     * @return mixed|string
     */
    public function toJson()
    {
        if(is_array($this->data)) {
            return \GuzzleHttp\json_encode($this->data);
        }
        return $this->serializer->serialize($this->data);
    }
}