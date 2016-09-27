<?php
/**
 * Class BaseService
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre;

use Dsc\MercadoLivre\Parser\SerializerInterface;
use Dsc\MercadoLivre\Http\MeliHandleResponse;
use Dsc\MercadoLivre\Http\MeliHandleResponseInterface;
use Dsc\MercadoLivre\Http\MeliResourceInterface;

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
    public function __construct(MeliInterface $meli, Client $client = null)
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
     * @param MeliResourceInterface $resource
     * @return MeliHandleResponseInterface
     */
    protected function get(MeliResourceInterface $resource)
    {
        return new MeliHandleResponse(
            $this->client->get($resource)->getBody(),
            $resource,
            $this->getSerializer()
        );
    }

    /**
     * @param MeliResourceInterface $resource
     * @return MeliHandleResponseInterface
     */
    protected function post(MeliResourceInterface $resource)
    {
        return new MeliHandleResponse(
            $this->client->post($resource)->getBody(),
            $resource,
            $this->getSerializer()
        );
    }

    /**
     * @param MeliResourceInterface $resource
     * @return MeliHandleResponseInterface
     */
    protected function put(MeliResourceInterface $request)
    {
        // TODO: Implement put() method.
    }

    /**
     * @param MeliResourceInterface $resource
     * @return MeliHandleResponseInterface
     */
    protected function delete(MeliResourceInterface $request)
    {
        // TODO: Implement delete() method.
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
}