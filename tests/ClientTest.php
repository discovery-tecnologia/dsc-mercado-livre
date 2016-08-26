<?php
namespace Dsc\MercadoLivre;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;

/**
 * @author Diego Wagner <diegowagner4@gmail.com>
 */
class ClientTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var HttpClient|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $httpClient;

    /**
     * @var Request|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $request;

    /**
     * @var Response|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $response;

    protected function setUp()
    {
        $this->httpClient = $this->createMock(HttpClient::class);
        $this->request    = $this->createMock(Request::class);
        $this->response   = $this->createMock(Response::class);
        $this->response->expects($this->any())
             ->method('getBody')
             ->willReturn(['result' => true]);
    }

    /**
     * @test
     */
    public function constructShouldAppendANewErrorListener()
    {
        $client = new Client($this->httpClient);
        $this->assertAttributeSame($this->httpClient, 'client', $client);
    }

    /**
     * @test
     */
    public function postShouldSendTheBodyAsArray()
    {
        $client = new Client($this->httpClient);
        $body = [
            "grant_type"    => "granttype",
            "client_id"     => 'clientid',
            "client_secret" => 'clientsecret',
            "refresh_token" => 'refreshtoken'
        ];
        $this->httpClient->expects($this->once())
             ->method('request')
             ->with(
                'POST',
                '/test',[
                    'headers' => ['Content-Type' => 'application/json; charset=UTF-8'],
                    'body' => $body,
                    'verify' => false
                ]
             )->willReturn($this->response);

        $response = $client->post('/test', $body);
        $this->assertEquals(['result' => true], $response->getBody());
    }

    /**
     * @test
     */
    public function getShouldConfigureHeaders()
    {
        $client = new Client($this->httpClient);
        $this->httpClient->expects($this->once())
             ->method('request')
             ->with('GET', '/test?name=Test', ['verify' => false])
             ->willReturn($this->response);

        $response = $client->get('/test?name=Test');
        $this->assertEquals(['result' => true], $response->getBody());
    }
}