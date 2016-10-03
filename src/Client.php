<?php
/**
 * Class Client
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre;

use Dsc\MercadoLivre\Environments\Production;
use Dsc\MercadoLivre\Handler\OAuth2ClientHandler;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\HandlerStack;

/**
 * @author Diego Wagner <diegowagner4@gmail.com>
 */
class Client
{
    const TIMEOUT = 60;
    const DEFAULT_HEADERS = [
        'headers' => [
            'Content-Type' => 'application/json; charset=UTF-8',
            'User-Agent'   => 'MELI-PHP-SDK-1.1.0'
        ],
        'verify'  => true
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
    public function __construct(MeliInterface $meli = null, HttpClient $client = null)
    {
        $stack = HandlerStack::create();
        $handler = new OAuth2ClientHandler($meli);
        $stack->push($handler);

        //TODO Verificar essa dependência - Acessos publicos sempre acessaram produção, como não existe ambiente de teste até o momento, não será problema
        $environment = $meli ? $meli->getEnvironment() : new Production();

        $this->client = $client ?: new HttpClient([
            'base_uri' => $environment->getWsHost(),
            'handler'  => $stack,
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
            $options = self::DEFAULT_HEADERS;
            $options['body'] = $data;
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
            $options = self::DEFAULT_HEADERS;
            if(! empty($params)) {
                $options = array_merge(['query' => $params], $options);
            }
            return $this->client->request('GET', $uri, $options);

        } catch(RequestException $re) {
            $this->handleError($re);
        }
    }

    /**
     * @param string $uri
     * @param string $data
     * @param array $params
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function put($uri, $data, $params = [])
    {
        try {
            $options = self::DEFAULT_HEADERS;
            $options['body'] = $data;
            if(! empty($params)) {
                $options = array_merge(['query' => $params], $options);
            }

            return $this->client->request('PUT', $uri, $options);

        } catch(RequestException $re) {
            $this->handleError($re);
        }
    }
}