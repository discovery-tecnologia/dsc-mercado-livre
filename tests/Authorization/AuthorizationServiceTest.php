<?php
namespace Dsc\MercadoLivre\Authorization;
use Dsc\MercadoLivre\Client;
use Dsc\MercadoLivre\Credentials;
use Dsc\MercadoLivre\Environment;
use Dsc\MercadoLivre\MeliInterface;

/**
 * @author Diego Wagner <diegowagner4@gmail.com>
 */
class AuthorizationServiceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var AuthorizationService
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

        $meli->expects($this->any())
             ->method('getRefreshToken')
             ->willReturn('refreshtoken');

        $environment = $this->getMockForAbstractClass(Environment::class);
        $environment->expects($this->any())
                    ->method('getWsAuth')
                    ->willReturn('ws.auth.test.com');
        $environment->expects($this->any())
                    ->method('getAuthUrl')
                    ->willReturn('ws.auth.test.com');

        $client = $this->createMock(Client::class);
        $credentials = new Credentials($meli, $environment);

        $this->service = new AuthorizationService($credentials, $client);
    }

//    /**
//     * @test
//     */
//    public function constructShouldConfigureTheAttributes()
//    {
//        $this->assertAttributeEquals(Credentials::class, 'credentials', $this->service);
//        $this->assertAttributeEquals(Client::class, 'client', $this->service);
//    }

    /**
     * @test
     */
    public function getAuthUrlShouldReturnTheCorrectUrl()
    {
        $url = $this->service->getAuthUrl('http://example.org');
        $this->assertEquals('ws.auth.test.com/authorize?client_id=clientid&response_type=code&redirect_uri=http://example.org', $url);
    }
}