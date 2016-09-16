<?php
namespace Dsc\MercadoLivre;

use Dsc\MercadoLivre\Codec\ParserSerializer;
use Dsc\MercadoLivre\Codec\SerializerInterface;
use Dsc\MercadoLivre\Http\RequestInterface;
use Psr\Http\Message\StreamInterface;

/**
 * @author Diego Wagner <diegowagner4@gmail.com>
 */
abstract class Service
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
     * @var SerializerInterface
     */
    protected $serializer;

    /**
     * @param Credentials $credentials
     * @param Client $client
     */
    public function __construct(MeliInterface $meli, Client $client = null, SerializerInterface $serializer = null)
    {
        $this->meli        = $meli;
        $this->client      = $client ?: new Client();
        $this->serializer  = $serializer ?: new ParserSerializer();
    }

    /**
     * @return MeliInterface
     */
    protected function getMeli()
    {
        return $this->meli;
    }

    /**
     * @param RequestInterface $request
     * @throws MeliException
     */
    protected function get(RequestInterface $request)
    {
        try {

            return $this->client->get($request)->getBody();

        } catch(MeliException $me) {
            throw $me;
        }
    }

    /**
     * @param RequestInterface $request
     * @return StreamInterface
     * @throws MeliException
     */
    protected function post(RequestInterface $request)
    {
        try {

            return $this->client->post($request)->getBody();

        } catch(MeliException $me) {
            throw $me;
        }
    }

    /**
     * @param RequestInterface $request
     */
    protected function put(RequestInterface $request)
    {
        // TODO: Implement put() method.
    }

    /**
     * @param RequestInterface $request
     */
    protected function delete(RequestInterface $request)
    {
        // TODO: Implement delete() method.
    }
}