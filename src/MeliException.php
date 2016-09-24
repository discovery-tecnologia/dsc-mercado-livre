<?php
namespace Dsc\MercadoLivre;

use Psr\Http\Message\ResponseInterface;

class MeliException extends \RuntimeException
{
    /**
     * @var int
     */
    private $stateCode;

    /**
     * @var string
     */
    private $jsonMessage;

    /**
     * @param ResponseInterface $response
     * @return MeliException
     */
    public static function create(ResponseInterface $response)
    {
        $exception = new static(static::createMessage($response));
        $exception->stateCode   = $response->getStatusCode();
        $exception->jsonMessage = $response->getBody();

        return $exception;
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

    /**
     * @return int
     */
    public function getStateCode()
    {
        return $this->stateCode;
    }

    /**
     * @param int $stateCode
     */
    public function setStateCode($stateCode)
    {
        $this->stateCode = $stateCode;
    }

    /**
     * @return string
     */
    public function getJsonMessage()
    {
        return (string)$this->jsonMessage;
    }

    /**
     * @param string $jsonMessage
     */
    public function setJsonMessage($jsonMessage)
    {
        $this->jsonMessage = $jsonMessage;
    }
}