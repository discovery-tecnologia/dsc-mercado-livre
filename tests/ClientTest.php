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
            'base_uri' => $this->meli->getEnvironment()->getWsHost(),
            'timeout'  => Client::TIMEOUT
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
        $data = [
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
                    'headers' => [
                        'Content-Type' => 'application/json; charset=UTF-8',
                        'User-Agent'   => Client::USERAGENT
                    ],
                    'json' => $data,
                    'verify'  => true
                ]
             )->willReturn($this->response);

        $response = $client->post('/test', $data);
        $this->assertEquals(['result' => true], $response->getBody());
    }

    /**
     * @test
     */
    public function getShouldConfigureHeaders()
    {
        $client = new Client($this->meli, $this->httpClient);
        $this->httpClient->expects($this->once())
             ->method('request')
             ->with('GET', '/test?name=Test',[
                     'headers' => [
                         'Content-Type' => 'application/json; charset=UTF-8',
                         'User-Agent'   => Client::USERAGENT
                     ],
                     'verify' => true
                 ])
             ->willReturn($this->response);

        $response = $client->get('/test?name=Test');
        $this->assertEquals(['result' => true], $response->getBody());
    }
}