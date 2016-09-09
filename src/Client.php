<?php
namespace Dsc\MercadoLivre;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\RequestException;

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
     * @param RequestException $exception
     * @throws MeliException
     */
    public function handleError(RequestException $exception)
    {
        throw MeliException::create($exception->getResponse());
    }

    /**
     * @param $url
     * @param array $body
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function post($url, array $body)
    {
        try {
            return $this->client->request(
                'POST',
                $url, [
                    'headers' => ['Content-Type' => 'application/json; charset=UTF-8'],
                    'body' => $body,
                    'verify' => false
                ]
            );
        } catch(RequestException $re) {
            $this->handleError($re);
        }
    }

    /**
     * @param string $url
     * @param array $params
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function get($url, array $params = [])
    {
        try {
            $options = [
                'headers' => ['Content-Type' => 'application/json; charset=UTF-8'],
                'verify'  => false
            ];

            if(! empty($params)) {
                $options = array_merge(['query' => $params], $options);
            }
            return $this->client->request('GET', $url, $options);

        } catch(RequestException $re) {
            $this->handleError($re);
        }
    }
}