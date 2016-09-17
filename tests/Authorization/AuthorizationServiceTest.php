<?php
namespace Dsc\MercadoLivre\Authorization;

use Dsc\MercadoLivre\Client;
use Dsc\MercadoLivre\Codec\SerializerInterface;
use Dsc\MercadoLivre\Configuration;
use Dsc\MercadoLivre\Environment;
use Dsc\MercadoLivre\MeliInterface;
use GuzzleHttp\Psr7\Response;

/**
 * @author Diego Wagner <diegowagner4@gmail.com>
 */
class AuthorizationServiceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var MeliInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    private $meli;

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
        $this->meli = $this->createMock(MeliInterface::class);
        $this->meli->expects($this->any())
             ->method('getClientId')
             ->willReturn('clientid');

        $this->meli->expects($this->any())
             ->method('getClientSecret')
             ->willReturn('clientsecret');

        $environment = $this->createMock(Environment::class);
        $environment->expects($this->any())
                    ->method('getAuthUrl')
                    ->willReturn('ws.auth.test.com/authorize');
        $environment->expects($this->any())
                    ->method('getConfiguration')
                    ->willReturn(new Configuration());

        $this->meli->expects($this->any())
             ->method('getEnvironment')
             ->willReturn($environment);

        $this->client = $this->createMock(Client::class);
        $this->service = new AuthorizationService($this->meli, $this->client);
    }

    /**
     * @test
     */
    public function constructShouldConfigureTheAttributes()
    {
        $this->assertAttributeSame($this->meli, 'meli', $this->service);
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

        $stream = \GuzzleHttp\Psr7\stream_for('{"data":"test"}');
        $response->expects($this->any())
                 ->method('getBody')
                 ->willReturn($stream);

        $this->client->expects($this->any())
                     ->method('post')
                     ->willReturn($response);

        $result = $this->service->authorize('/authorize', 'example.org');
        $this->assertInstanceOf(Authorization::class, $result);
    }

    /**
     * @expectedException \Dsc\MercadoLivre\MeliException;
     * @expectedExceptionMessage [403] A HTTP error has occurred: {"message":"Offline-Access is not allowed.", "status":403}
     */
    public function refreshTokenMethodShouldReturnIsNotAllowedCaseRefreshTokenIsNull()
    {
        $this->service->refreshAccessToken(null);
    }

    /**
     * @expectedException \Dsc\MercadoLivre\MeliException;
     * @expectedExceptionMessage [403] A HTTP error has occurred: {"message":"User not authenticate - unauthorized", "status":403}
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