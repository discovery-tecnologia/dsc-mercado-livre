<?php
namespace Dsc\MercadoLivre;

use Dsc\MercadoLivre\Codec\ParserSerializer;
use Dsc\MercadoLivre\Codec\SerializerInterface;
use Dsc\MercadoLivre\Http\MeliResponseInterface;
use Dsc\MercadoLivre\Http\MeliResourceInterface;
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
     * Service constructor.
     * @param MeliInterface $meli
     * @param Client|null $client
     * @param SerializerInterface|null $serializer
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
     * @param Resource $request
     * @throws MeliException
     */
    protected function get(MeliResourceInterface $request)
    {
        try {

            return $this->client->get($request)
                                ->getBody();

        } catch(MeliException $me) {
            throw $me;
        }
    }

    /**
     * @param Resource $request
     * @return StreamInterface
     * @throws MeliException
     */
    protected function post(MeliResourceInterface $request)
    {
        try {

            return $this->client->post($request)
                                ->getBody();

        } catch(MeliException $me) {
            throw $me;
        }
    }

    /**
     * @param Resource $request
     */
    protected function put(MeliResourceInterface $request)
    {
        // TODO: Implement put() method.
    }

    /**
     * @param Resource $request
     */
    protected function delete(MeliResourceInterface $request)
    {
        // TODO: Implement delete() method.
    }

    /**
     * @param StreamInterface $stream
     * @param MeliResponseInterface $response
     * @return mixed
     */
    protected function handleResponse(StreamInterface $stream, MeliResponseInterface $response)
    {
        $formatter = $this->getMeli()
                          ->getEnvironment()
                          ->getConfiguration()
                          ->getFormatter();

        return $this->serializer->deserialize($stream->getContents(), $response->getEntityTarget(), $formatter);
    }
}