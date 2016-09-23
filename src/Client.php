<?php
namespace Dsc\MercadoLivre;

use Dsc\MercadoLivre\Http\MeliResourceInterface;
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
     * @param MeliInterface $meli
     * @param HttpClient|null $client
     */
    public function __construct(MeliInterface $meli, HttpClient $client = null)
    {
        $this->client = $client ?: new HttpClient([
            'base_uri' => $meli->getEnvironment()->getWsHost()
        ]);
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
     * @param Resource $request
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function post(MeliResourceInterface $resource)
    {
        try {
            return $this->client->request(
                'POST',
                $resource->getUrl(), [
                    'headers' => [
                        'Content-Type' => 'application/x-www-form-urlencoded; charset=UTF-8'
                    ],
                    'form_params' => $resource->getParams(),
                    'verify'      => true
                ]
            );
        } catch(RequestException $re) {
            $this->handleError($re);
        }
    }

    /**
     * @param Resource $request
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function get(MeliResourceInterface $resource)
    {
        $params = $resource->getParams();
        try {
            $options = [
                'headers' => [
                    'Content-Type' => 'application/json; charset=UTF-8'
                ],
                'verify'  => true
            ];

            if(! empty($params)) {
                $options = array_merge(['query' => $params], $options);
            }
            return $this->client->request('GET', $resource->getUrl(), $options);

        } catch(RequestException $re) {
            $this->handleError($re);
        }
    }
}