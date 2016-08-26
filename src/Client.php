<?php
namespace Dsc\MercadoLivre;

use GuzzleHttp\Client as HttpClient;

/**
 * @author Diego Wagner <diegowagner4@gmail.com>
 */
class Client
{
    /**
     * Configuration for CURL
     */
    public static $CURL_OPTS = [
        CURLOPT_USERAGENT      => "MELI-PHP-SDK-1.1.0",
        CURLOPT_SSL_VERIFYPEER => true,
        CURLOPT_CONNECTTIMEOUT => 10,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_TIMEOUT        => 60
    ];

    /**
     * @var HttpClient
     */
    private $client;

    /**
     * Client constructor.
     * @param HttpClient|null $client
     */
    public function __construct(HttpClient $client = null)
    {
        $this->client = $client ?: new HttpClient();
    }

    /**
     * @param $url
     * @param array $body
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function post($url, array $body)
    {
        return $this->client->request(
            'POST',
            $url, [
                'headers' => ['Content-Type' => 'application/json; charset=UTF-8'],
                'body'    => $body,
                'verify'  => false
            ]
        );
    }
    /**
     * @param string $url
     *
     * @return \SimpleXMLElement
     */
    public function get($url)
    {
        $response = $this->client->get($url, ['verify' => false]);
        return $response->json();
    }
}