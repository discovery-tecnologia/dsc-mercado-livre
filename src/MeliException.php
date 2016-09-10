<?php
namespace Dsc\MercadoLivre;

use Psr\Http\Message\ResponseInterface;

class MeliException extends \RuntimeException
{
    /**
     * @param ResponseInterface $response
     * @return MeliException
     */
    public static function create(ResponseInterface $response)
    {
        return new static(static::createMessage($response));
    }

    /**
     * @param ResponseInterface $response
     * @return string
     */
    protected static function createMessage(ResponseInterface $response)
    {
        if ($response->getStatusCode() == 404) {
            return  '[' . $response->getStatusCode() . '] Not found: ' . $response->getBody();
        }

        if ($response->getStatusCode() != 400) {
            return '[' . $response->getStatusCode() . '] A HTTP error has occurred: ' . $response->getBody();
        }

        return '[' . $response->getStatusCode() . '] Some errors occurred: ' . $response->getBody();
    }
}