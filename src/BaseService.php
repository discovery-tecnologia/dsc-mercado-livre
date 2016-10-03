<?php
/**
 * Class BaseService
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre;

use Dsc\MercadoLivre\Http\RequestBuilder;
use Dsc\MercadoLivre\Parser\ParserSerializer;
use Dsc\MercadoLivre\Parser\SerializerInterface;

abstract class BaseService
{
    /**
     * @var MeliInterface
     */
    private $meli;

    /**
     * @var Client
     */
    private $client;

    /**
     * Service constructor.
     * @param MeliInterface $meli
     * @param Client|null $client
     * @param SerializerInterface|null $serializer
     */
    public function __construct(MeliInterface $meli = null, Client $client = null)
    {
        $this->meli   = $meli;
        $this->client = $client ?: new Client($meli);
    }

    /**
     * @return MeliInterface
     */
    protected function getMeli()
    {
        return $this->meli;
    }

    /**
     * @param $uri
     * @param $params
     */
    protected function get($uri, $params = [])
    {
        return $this->client->get($uri, $params)->getBody();
    }

    /**
     * @param $uri
     * @param $data
     * @param $params
     */
    protected function post($uri, $data, $params = [], SerializerInterface $serializer = null)
    {
        $serializer = $serializer ?: $this->getSerializer();
        $request = new RequestBuilder($data, $serializer);
        return $this->client->post($uri, $request->getRequest(), $params)->getBody();
    }

    /**
     * @param $uri
     * @param $data
     * @param array $params
     */
    protected function put($uri, $data, $params = [])
    {
        // TODO: Implement put() method.
    }

    /**
     * @param $uri
     * @param array $params
     */
    protected function delete($uri, $params = [])
    {
        // TODO: Implement delete() method.
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
}