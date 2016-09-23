<?php
namespace Dsc\MercadoLivre;

use Dsc\MercadoLivre\Http\MeliResourceInterface;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;

/**
 * @author Diego Wagner <diegowagner4@gmail.com>
 */
class ClientTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var MeliInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $meli;

    /**
     * @var HttpClient|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $httpClient;

    /**
     * @var Request|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $resource;

    /**
     * @var Response|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $response;

    protected function setUp()
    {
        $environment = $this->getMockForAbstractClass(Environment::class);
        $environment->expects($this->any())
                    ->method('getWsHost')
                    ->willReturn('https://test.com');

        $this->meli  = $this->createMock(MeliInterface::class);
        $this->meli->expects($this->any())
                   ->method('getEnvironment')
                   ->willReturn($environment);

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
    public function constructShouldInstatiateHttpClient()
    {
        $client = new Client($this->meli);
        $this->assertAttributeEquals(new HttpClient([
            'base_uri' => $this->meli->getEnvironment()->getWsHost()
        ]), 'client', $client);
    }

    /**
     * @test
     */
    public function constructShouldReceiveHttpClient()
    {
        $client = new Client($this->meli, $this->httpClient);
        $this->assertAttributeSame($this->httpClient, 'client', $client);
    }

    /**
     * @test
     */
    public function postShouldSendTheBodyAsArray()
    {
        $client = new Client($this->meli, $this->httpClient);
        $body = [
            "grant_type"    => "granttype",
            "client_id"     => 'clientid',
            "client_secret" => 'clientsecret',
            "refresh_token" => 'refreshtoken'
        ];
        $resource = $this->createMock(MeliResourceInterface::class);
        $resource->expects($this->any())
                ->method('getParams')
                ->willReturn($body);
        $resource->expects($this->any())
                ->method('getPath')
                ->willReturn('/test');

        $this->httpClient->expects($this->once())
             ->method('request')
             ->with(
                'POST',
                '/test',[
                    'headers' => ['Content-Type' => 'application/x-www-form-urlencoded; charset=UTF-8'],
                    'form_params' => $body,
                    'verify'  => true
                ]
             )->willReturn($this->response);

        $response = $client->post($resource);
        $this->assertEquals(['result' => true], $response->getBody());
    }

    /**
     * @test
     */
    public function getShouldConfigureHeaders()
    {
        $client = new Client($this->meli, $this->httpClient);
        $resource = $this->createMock(MeliResourceInterface::class);
        $resource->expects($this->any())
                ->method('getParams')
                ->willReturn([]);
        $resource->expects($this->any())
            ->method('getPath')
            ->willReturn('/test?name=Test');

        $this->httpClient->expects($this->once())
             ->method('request')
             ->with('GET', '/test?name=Test',[
                     'headers' => ['Content-Type' => 'application/json; charset=UTF-8'],
                     'verify' => true
                 ])
             ->willReturn($this->response);

        $response = $client->get($resource);
        $this->assertEquals(['result' => true], $response->getBody());
    }
}