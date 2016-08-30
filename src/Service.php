<?php
namespace Dsc\MercadoLivre;

use Psr\Http\Message\StreamInterface;

class Service
{
    /**
     * @var Credentials
     */
    protected $credentials;

    /**
     * @var Client
     */
    protected $client;

    /**
     * @param Credentials $credentials
     * @param Client $client
     */
    public function __construct(Credentials $credentials, Client $client = null)
    {
        $this->credentials = $credentials;
        $this->client      = $client ?: new Client();
    }

    /**
     * @param string $url
     * @param array $body
     * @return StreamInterface
     */
    protected function post($url, array $body)
    {
        $response = $this->client->post($url, $body);
        if($response->getStatusCode() == 200) {
            return $response->getBody();
        }
    }
}