<?php
/**
 * Class Client
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre;

use Dsc\MercadoLivre\Handler\HandlerInterface;
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
            'User-Agent'   => 'MELI-DSC-SDK'
        ],
        'verify'  => true
    ];
    const SKIP_OAUTH = 'skipOAuth';

    /**
     * @var HttpClient
     */
    private $client;

    /**
     * Client constructor.
     * @param MeliInterface $meli
     * @param HttpClient|null $client
     */
    public function __construct(MeliInterface $meli, HttpClient $client = null, HandlerInterface $handler = null)
    {
        $stack = HandlerStack::create();
        $handler = $handler ?: new OAuth2ClientHandler($meli);
        $stack->push($handler);

        $this->client = $client ?: new HttpClient([
            'base_uri' => $meli->getEnvironment()->getWsHost(),
            'handler'  => $stack,
            'timeout'  => static::TIMEOUT
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
        return $this->execute('POST',$uri, $this->makeOptionsForRequest($params, $data));
    }

    /**
     * @param string $uri
     * @param array $params
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function get($uri, $params = [])
    {
        return $this->execute('GET', $uri, $this->makeOptionsForRequest($params));
    }

    /**
     * @param string $uri
     * @param string $data
     * @param array $params
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function put($uri, $data, $params = [])
    {
        return $this->execute('PUT', $uri, $this->makeOptionsForRequest($params, $data));
    }

    /**
     * @param string $uri
     * @param array $params
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function delete($uri, $params = [])
    {
        return $this->execute('DELETE', $uri, $this->makeOptionsForRequest($params));
    }

    /**
     * @param $method
     * @param $uri
     * @param $data
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    private function execute($method, $uri, $data)
    {
        try {

            return $this->client->request($method, $uri, $data)->getBody();

        } catch(RequestException $re) {
            $this->handleError($re);
        }
    }

    /**
     * @param $params
     * @param null $data
     * @return array
     */
    private function makeOptionsForRequest($params, $data = null)
    {
        $options = static::DEFAULT_HEADERS;

        if($data !== null) {
            $options['body'] = $data;
        }

        if(array_key_exists(static::SKIP_OAUTH, $params) && $params[static::SKIP_OAUTH] === true) {
            $options[static::SKIP_OAUTH] = $params[static::SKIP_OAUTH];
            unset($params[static::SKIP_OAUTH]); // retirado do params para não afetar a query string
        }

        if(! empty($params)) {
            $options = array_merge(['query' => $params], $options);
        }
        return $options;
    }
}
