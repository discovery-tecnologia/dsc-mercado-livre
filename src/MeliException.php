<?php
namespace Dsc\MercadoLivre;

use GuzzleHttp\Psr7\Response;

class MeliException extends \RuntimeException
{
    /**
     * @param Response $response
     *
     * @return MeliException
     */
    public static function create(Response $response)
    {
        return new static(static::createMessage($response));
    }
    /**
     * @param Response $response
     *
     * @return string
     */
    protected static function createMessage(Response $response)
    {
        if ($response->getStatusCode() != 400) {
            return  '[' . $response->getStatusCode() . '] A HTTP error has occurred: ' . $response->getBody();
        }

        if ($response->getStatusCode() != 404) {
            return  '[' . $response->getStatusCode() . '] Not found';
        }

        $message = 'Some errors occurred:';

        return $message;
    }
}