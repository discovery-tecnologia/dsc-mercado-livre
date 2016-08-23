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

    public function __construct(HttpClient $client = null)
    {
        $this->client = $client ?: new HttpClient();
    }

    /**
     * @param string $url
     * @param \SimpleXMLElement $body
     *
     * @return \SimpleXMLElement
     */
    public function post($url, \SimpleXMLElement $body)
    {
        $response = $this->client->post(
            $url,
            [
                'headers' => ['Content-Type' => 'application/xml; charset=UTF-8'],
                'body'    => $body->asXML(),
                'verify'  => false
            ]
        );
        return $response->xml();
    }
    /**
     * @param string $url
     *
     * @return \SimpleXMLElement
     */
    public function get($url)
    {
        $response = $this->client->get($url, ['verify' => false]);
        return $response->xml();
    }
}