<?php
namespace Dsc\MercadoLivre;

use Doctrine\Common\Cache\Cache;

/**
 * @author Diego Wagner <diegowagner4@gmail.com>
 */
class ServiceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Cache
     */
    protected $cache;

    /**
     * @var Service
     */
    protected $service;

    protected function setUp()
    {
        $this->cache = $this->createMock(Cache::class);

        $environment  = $this->createMock(Environment::class);
        $environment->expects($this->any())
            ->method('getAuthUrl')
            ->willReturn('ws.auth.test.com/authorize');
        $environment->expects($this->any())
            ->method('getConfiguration')
            ->willReturn(new Configuration(null, $this->cache));

        $meli   = new Meli('client-id', 'client-secret', $environment);
        $client = $this->createMock(Client::class);

        $this->service = $this->getMockForAbstractClass(Service::class, [$meli, $client]);
    }

    /**
     * @test
     */
    public function constructorShouldConfigureCache()
    {
        $this->assertAttributeSame($this->cache, 'cache', $this->service);
    }

    /**
     * @test
     */
    public function getOAuthUrlShouldReturnTheCorrectUrl()
    {
        $url = $this->service->getOAuthUrl('example.org');
        $this->assertEquals('ws.auth.test.com/authorize?client_id=client-id&response_type=code&redirect_uri=example.org', $url);
    }
}
