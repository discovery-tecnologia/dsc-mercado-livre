<?php
/**
 * Class BaseService
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre;

use Dsc\MercadoLivre\Http\RequestBuilder;
use Dsc\MercadoLivre\Http\ResponseBuilder;
use Dsc\MercadoLivre\Parser\ParserSerializer;
use Dsc\MercadoLivre\Parser\SerializerInterface;
use Psr\Http\Message\StreamInterface;

abstract class BaseService
{
    /**
     * @var MeliInterface
     */
    protected $meli;

    /**
     * @var Client
     */
    protected $client;

    /**
     * Service constructor.
     * @param MeliInterface $meli
     * @param Client|null $client
     * @param SerializerInterface|null $serializer
     */
    public function __construct(MeliInterface $meli, Client $client = null)
    {
        $this->meli   = $meli;
        $this->client = $client ?: new Client($meli);
    }

    /**
     * @return MeliInterface
     */
    public function getMeli()
    {
        return $this->meli;
    }

    /**
     * @param $uri
     * @param $params
     */
    protected function get($uri, $params = [])
    {
        return $this->client->get($uri, $params);
    }

    /**
     * @param $uri
     * @param $data
     * @param $params
     */
    protected function post($uri, $data, $params = [])
    {
        return $this->client->post($uri, $this->getRequest($data), $params);
    }

    /**
     * @param $uri
     * @param $data
     * @param array $params
     */
    protected function put($uri, $data, $params = [])
    {
        return $this->client->put($uri, $this->getRequest($data), $params);
    }

    /**
     * @param $uri
     * @param array $params
     */
    protected function delete($uri, $params = [])
    {
        return $this->client->delete($uri, $params);
    }

    /**
     * @return SerializerInterface
     */
    protected function getSerializer()
    {
        return $this->getMeli()
            ?  $this->getMeli()
                    ->getEnvironment()
                    ->getConfiguration()
                    ->getSerializer()
            : new ParserSerializer();
    }

    /**
     * @param mixed $data
     * @return mixed
     */
    protected function getRequest($data)
    {
        return (new RequestBuilder($data, $this->getSerializer()))->toJson();
    }

    /**
     * @param StreamInterface $response
     * @param $target
     * @return mixed
     */
    protected function getResponse(StreamInterface $response, $target)
    {
        return (new ResponseBuilder($response, $target, $this->getSerializer()))->toObject();
    }
}