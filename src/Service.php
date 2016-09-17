<?php
namespace Dsc\MercadoLivre;

use Dsc\MercadoLivre\Codec\SerializerInterface;
use Dsc\MercadoLivre\Codec\TargetSerializerInterface;
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
     * Service constructor.
     * @param MeliInterface $meli
     * @param Client|null $client
     * @param SerializerInterface|null $serializer
     */
    public function __construct(MeliInterface $meli, Client $client = null)
    {
        $this->meli   = $meli;
        $this->client = $client ?: new Client();
    }

    /**
     * @return MeliInterface
     */
    protected function getMeli()
    {
        return $this->meli;
    }

    /**
     * @param MeliResourceInterface $resource
     * @return mixed
     */
    protected function get(MeliResourceInterface $resource)
    {
        try {

            $stream = $this->client->get($resource)->getBody();
            return $this->handleResponse($stream, $resource);

        } catch(MeliException $me) {
            throw $me;
        }
    }

    /**
     * @param MeliResourceInterface $resource
     * @return mixed
     */
    protected function post(MeliResourceInterface $resource)
    {
        try {

            $stream = $this->client->post($resource)->getBody();
            return $this->handleResponse($stream, $resource);

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
     * @param TargetSerializerInterface $resource
     * @return mixed
     */
    protected function handleResponse(StreamInterface $stream, TargetSerializerInterface $resource)
    {
        return $this->getSerializer()
                    ->deserialize($stream->getContents(), $resource->getTarget(), $this->getFormatter());
    }

    /**
     * @return SerializerInterface
     */
    private function getSerializer()
    {
        return $this->getMeli()
                    ->getEnvironment()
                    ->getConfiguration()
                    ->getSerializer();
    }

    /**
     * @return string
     */
    private function getFormatter()
    {
        return $this->getMeli()
                    ->getEnvironment()
                    ->getConfiguration()
                    ->getFormatter();
    }
}