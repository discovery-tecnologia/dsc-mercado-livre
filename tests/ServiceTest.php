<?php
namespace Dsc\MercadoLivre;

use Dsc\MercadoLivre\Environments\Site;

/**
 * @author Diego Wagner <diegowagner4@gmail.com>
 */
class ServiceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Credentials
     */
    protected $credentials;

    /**
     * @var Client|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $client;

    protected function setUp()
    {
        $meli = new Meli('client-id', 'client-secret');
        $this->credentials = new Credentials($meli, Site::BRASIL);
        $this->client      = $this->createMock(Client::class);
    }

    /**
     * @test
     */
    public function constructorShouldConfigureAttributes()
    {
        $service = $this->getMockForAbstractClass(
            Service::class,
            [$this->credentials, $this->client]
        );
        $this->assertAttributeSame($this->credentials, 'credentials', $service);
        $this->assertAttributeSame($this->client, 'client', $service);
    }

    /**
     * @test
     */
    public function constructorShouldCreateAClientWhenItWasntInformed()
    {
        $service = $this->getMockForAbstractClass(
            Service::class,
            [$this->credentials]
        );
        $this->assertAttributeInstanceOf(Client::class, 'client', $service);
    }
}
