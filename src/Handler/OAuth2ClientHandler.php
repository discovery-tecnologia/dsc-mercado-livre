<?php
/**
 * Class OAuth2ClientHandler
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Handler;

use Dsc\MercadoLivre\AccessToken;
use Dsc\MercadoLivre\MeliException;
use Dsc\MercadoLivre\MeliInterface;
use Dsc\MercadoLivre\Requests\RequestService;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\RequestInterface;

/**
 * Class OAuth2ClientHandler
 * @package Dsc\MercadoLivre\Handler
 */
class OAuth2ClientHandler extends Client implements HandlerInterface
{
    /**
     * @var MeliInterface
     */
    private $meli;

    /**
     * OAuth2ClientHandler constructor.
     * @param MeliInterface $meli
     */
    public function __construct(MeliInterface $meli)
    {
        $options = [];
        $this->meli  = $meli;
        $options['base_uri'] = $meli->getEnvironment()->getWsAuth();
        parent::__construct($options);
    }

    /**
     * @param callable $handler
     * @return \Closure
     */
    public function __invoke(callable $handler)
    {
        return function ($request, array $options) use ($handler) {
            if($this->meli->getClientId() !== RequestService::CLIENT_ID && ! array_key_exists('skipOAuth', $options)) {
                $request = $this->authorize($request);
            }
            return $handler($request, $options);
        };
    }

    /**
     * @param RequestInterface $request
     * @return RequestInterface
     * @throws NotAuthorizedException
     */
    private function authorize(RequestInterface $request)
    {
        $meli = $this->meli;
        $environment = $meli->getEnvironment();
        $storage = $environment->getConfiguration()->getStorage();

        $tenant = $meli->getTenantId();
        $accessToken = new AccessToken($storage, $tenant);
        $token = $accessToken->getToken();
        if(! $token) {
            $this->throwNoAuthorizeException();
        }

        if($accessToken->isExpired()) {

            $refreshToken = $accessToken->getRefreshToken();
            if(! $refreshToken) {
                $this->throwNoAuthorizeException();
            }

            /** @var \stdClass $authorization */
            $authorization = $this->refreshAccessToken($refreshToken);
            $accessToken->setToken($authorization->access_token);
            $accessToken->setRefreshToken($authorization->refresh_token);
            $accessToken->setExpireIn($authorization->expires_in);

            $token = $authorization->access_token;
        }
        
        $queryparams = \GuzzleHttp\Psr7\parse_query($request->getUri()->getQuery());
        $preparedParams = \GuzzleHttp\Psr7\build_query($queryparams);

        return $request->withHeader('Authorization', "Bearer $token")
                       ->withUri(
                           $request->getUri()->withQuery($preparedParams
                        )
                    );
    }

    /**
     * @return mixed
     */
    private function refreshAccessToken($refreshToken)
    {
        $uri  = $this->meli->getEnvironment()->getOAuthUri();
        $data = [
            'base_uri' => $this->meli->getEnvironment()->getWsHost(),
            'form_params' => [
                'grant_type'    => 'refresh_token',
                'client_id'     => $this->meli->getClientId(),
                'client_secret' => $this->meli->getClientSecret(),
                'refresh_token' => $refreshToken
            ]
        ];
        $response = $this->post($uri, $data);

        return \GuzzleHttp\json_decode($response->getBody()->getContents());
    }

    /**
     * @throws NotAuthorizedException
     */
    private function throwNoAuthorizeException()
    {
        throw MeliException::create(new Response(403, [], "User not authenticate - unauthorized"));
    }
}
