<?php
namespace Dsc\MercadoLivre\Authorization;

use Dsc\MercadoLivre\Client;
use Dsc\MercadoLivre\Credentials;
use Dsc\MercadoLivre\Environment;
use Dsc\MercadoLivre\MeliInterface;
use GuzzleHttp\Psr7\Response;

/**
 * @author Diego Wagner <diegowagner4@gmail.com>
 */
class AuthorizationServiceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Credentials|\PHPUnit_Framework_MockObject_MockObject
     */
    private $credentials;

    /**
     * @var Client|\PHPUnit_Framework_MockObject_MockObject
     */
    private $client;

    /**
     * @var AuthorizationService|\PHPUnit_Framework_MockObject_MockObject
     */
    private $service;

    protected function setUp()
    {
        $meli = $this->createMock(MeliInterface::class);
        $meli->expects($this->any())
             ->method('getClientId')
             ->willReturn('clientid');

        $meli->expects($this->any())
             ->method('getClientSecret')
             ->willReturn('clientsecret');

        $meli->expects($this->any())
             ->method('getAccessToken')
             ->willReturn('accesstoken');

        $environment = $this->createMock(Environment::class);
        $environment->expects($this->any())
                    ->method('getAuthUrl')
                    ->willReturn('ws.auth.test.com/authorize');

        $this->client = $this->createMock(Client::class);
        $this->credentials = new Credentials($meli, $environment);

        $this->service = new AuthorizationService($this->credentials, $this->client);
    }

    /**
     * @test
     */
    public function constructShouldConfigureTheAttributes()
    {
        $this->assertAttributeSame($this->credentials, 'credentials', $this->service);
        $this->assertAttributeSame($this->client, 'client', $this->service);
    }

    /**
     * @test
     */
    public function getAuthUrlShouldReturnTheCorrectUrl()
    {
        $url = $this->service->getAuthUrl('/authorize', 'example.org');
        $this->assertEquals('ws.auth.test.com/authorize?client_id=clientid&response_type=code&redirect_uri=example.org', $url);
    }

    /**
     * @test
     */
    public function authorizeMethodShouldReturnTrue()
    {
        $response = $this->createMock(Response::class);
        $response->expects($this->any())
                 ->method('getStatusCode')
                 ->willReturn(200);
        $response->expects($this->any())
                 ->method('getBody')
                 ->willReturn(['result' => true]);

        $this->client->expects($this->any())
             ->method('post')
             ->willReturn($response);

        $result = $this->service->authorize('/authorize', 'example.org');
        $this->assertEquals(['result' => true], $result);
    }

    /**
     * @test
     */
    public function refreshTokenMethodShouldReturnIsNotAllowedCaseRefreshTokenIsNull()
    {
        $result = $this->service->refreshAccessToken();
        $this->assertEquals([
            'error'    => 'Offline-Access is not allowed.',
            'httpCode' => null
        ], $result);
    }

    /**
     * @expectedException \Dsc\MercadoLivre\Authorization\AuthorizationException;
     * @expectedExceptionMessage User not authenticate.
     */
    public function accessTokenShouldReturnUserNotAuthenticateCaseNotExistsCodeOrAccessToken()
    {
        $this->service->getAccessToken();
    }

//    /**
//     * @test
//     */
//    public function getAccessTokenShouldSaveDataInCache()
//    {
//        $response = $this->createMock(Response::class);
//        $response->expects($this->any())
//            ->method('getStatusCode')
//            ->willReturn(200);
//
//        $std = new \stdClass();
//        $std->access_token  = 'token';
//        $std->refresh_token = 'refresh';
//        $std->expires_in = 0;
//
//        $this->credentials->getCredential()->setRefreshToken('refresh');
//        $response->expects($this->any())
//            ->method('getBody')
//            ->willReturn(['httpCode' => 200, 'body' => $std]);
//
//        $this->client->expects($this->any())
//             ->method('post')
//             ->willReturn($response);
//
//        $result = $this->service->getAccessToken('codetest');
//        $this->assertEquals(['result' => true], $result);
//    }
}