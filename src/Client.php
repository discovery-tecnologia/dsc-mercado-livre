<?php
namespace Dsc\MercadoLivre;

use GuzzleHttp\Client as HttpClient;

/**
 * @author Diego Wagner <diegowagner4@gmail.com>
 */
class Client
{
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
                'body' => $body->asXML(),
                'verify' => false
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