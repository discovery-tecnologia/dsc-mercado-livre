<?php
/**
 * Class OAuth2ClientHandler
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Handler;

use Dsc\MercadoLivre\MeliException;
use Dsc\MercadoLivre\MeliInterface;
use Dsc\MercadoLivre\Storage\StorageInterface;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\RequestInterface;

/**
 * Class OAuth2ClientHandler
 * @package Dsc\MercadoLivre\Handler
 */
class OAuth2ClientHandler extends Client implements HandlerInterface
{
    const ACCESS_TOKEN  = 'access_token';
    const REFRESH_TOKEN = 'refresh_token';
    const EXPIRE_IN     = 'expire_in';

    /**
     * @var MeliInterface
     */
    private $meli;

    /**
     * @var StorageInterface
     */
    private $storage;

    /**
     * OAuth2ClientHandler constructor.
     * @param MeliInterface $meli
     */
    public function __construct(MeliInterface $meli = null)
    {
        $options = [];
        $this->meli  = $meli;
        if($meli !== null) {
            $options['base_uri'] = $meli->getEnvironment()->getWsAuth();
            $this->storage = $meli->getEnvironment()->getConfiguration()->getStorage();
        }
        parent::__construct($options);
    }

    /**
     * @param callable $handler
     * @return \Closure
     */
    public function __invoke(callable $handler)
    {
        return function ($request, array $options) use ($handler) {
            if($this->meli !== null && ! array_key_exists('skipOAuth', $options)) {
                $request = $this->authorize($request);
            }
            return $handler($request, $options);
        };
    }

    /**
     * @param RequestInterface $request
     * @return RequestInterface
     */
    private function authorize(RequestInterface $request)
    {
        $accessToken = $this->getAccessToken();
        if(! $accessToken) {
            throw MeliException::create(new Response(403, [], "User not authenticate - unauthorized"));
        }

        if($this->isExpired()) {
            /** @var \stdClass $authorization */
            $authorization = $this->refreshAccessToken();
            $this->setAccessToken($authorization->access_token);
            $this->setRefreshToken($authorization->refresh_token);
            $this->setExpireIn(time() + $authorization->expires_in);

            $accessToken = $authorization->access_token;
        }

        $oauthparams['access_token'] = $accessToken;
        $queryparams = \GuzzleHttp\Psr7\parse_query($request->getUri()->getQuery());
        $preparedParams = \GuzzleHttp\Psr7\build_query($oauthparams + $queryparams);
        $request = $request->withUri($request->getUri()->withQuery($preparedParams));

        return $request;
    }

    /**
     * @return mixed
     */
    private function refreshAccessToken()
    {
        $refreshToken = $this->getRefreshToken();
        if(! $refreshToken) {
            throw MeliException::create(new Response(403, [], "User not authenticate - unauthorized"));
        }

        $uri  = $this->meli->getEnvironment()->getOAuthUri();
        $data = [
            'grant_type'    => 'refresh_token',
            'client_id'     => $this->meli->getClientId(),
            'client_secret' => $this->meli->getClientSecret(),
            'refresh_token' => $refreshToken
        ];
        $response = $this->post($uri, $data);

        return \GuzzleHttp\json_decode($response->getBody()->getContents());
    }

    /**
     * @return string|bool
     */
    public function getAccessToken()
    {
        return $this->storage->get(OAuth2ClientHandler::ACCESS_TOKEN);
    }

    /**
     * @param string $accessToken
     */
    public function setAccessToken($accessToken)
    {
        $this->storage->set(OAuth2ClientHandler::ACCESS_TOKEN, $accessToken);
    }

    /**
     * @return string
     */
    public function getRefreshToken()
    {
        return $this->storage->get(OAuth2ClientHandler::REFRESH_TOKEN);
    }

    /**
     * @param string $refreshToken
     */
    public function setRefreshToken($refreshToken)
    {
        $this->storage->set(OAuth2ClientHandler::REFRESH_TOKEN, $refreshToken);
    }

    /**
     * @return int
     */
    public function getExpireIn()
    {
        return $this->storage->get(OAuth2ClientHandler::EXPIRE_IN);
    }

    /**
     * @param int $expireIn
     */
    public function setExpireIn($expireIn)
    {
        $this->storage->set(OAuth2ClientHandler::EXPIRE_IN, $expireIn);
    }

    /**
     * @return bool
     */
    public function isExpired()
    {
        if($this->storage->has(OAuth2ClientHandler::EXPIRE_IN)) {
            if($this->storage->get(OAuth2ClientHandler::EXPIRE_IN) >= time()) {
                return false;
            }
        }
        return true;
    }
}