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
    const USERAGENT = "MELI-PHP-SDK-1.1.0";
    const TIMEOUT   = 60;

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
            'base_uri' => $meli->getEnvironment()->getWsHost(),
            'timeout'  => self::TIMEOUT
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
     * @param string $uri
     * @param string $data
     * @param array $params
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function post($uri, $data, $params = [])
    {
        try {

            $options = [
                'headers' => [
                    'Content-Type' => 'application/json; charset=UTF-8',
                    'User-Agent'   => self::USERAGENT
                ],
                'json'    => $data,
                'verify'  => true
            ];

            if(! empty($params)) {
                $options = array_merge(['query' => $params], $options);
            }

            return $this->client->request('POST', $uri, $options);

        } catch(RequestException $re) {
            $this->handleError($re);
        }
    }

    /**
     * @param string $uri
     * @param array $params
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function get($uri, $params = [])
    {
        try {
            $options = [
                'headers' => [
                    'Content-Type' => 'application/json; charset=UTF-8',
                    'User-Agent'   => self::USERAGENT
                ],
                'verify'  => true
            ];

            if(! empty($params)) {
                $options = array_merge(['query' => $params], $options);
            }
            return $this->client->request('GET', $uri, $options);

        } catch(RequestException $re) {
            $this->handleError($re);
        }
    }
}