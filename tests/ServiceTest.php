<?php
namespace Dsc\MercadoLivre;

use Dsc\MercadoLivre\Codec\SerializerInterface;
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

    /**
     * @var SerializerInterface
     */
    protected $serializer;

    protected function setUp()
    {
        $meli = new Meli('client-id', 'client-secret');
        $this->credentials = new Credentials($meli, Site::BRASIL);
        $this->client      = $this->createMock(Client::class);
        $this->serializer  = $this->getMockBuilder(SerializerInterface::class)->getMock();
    }

    /**
     * @test
     */
    public function constructorShouldConfigureAttributes()
    {
        $service = $this->getMockForAbstractClass(
            Service::class,
            [$this->credentials, $this->client, $this->serializer]
        );
        $this->assertAttributeSame($this->credentials, 'credentials', $service);
        $this->assertAttributeSame($this->client, 'client', $service);
        $this->assertAttributeSame($this->serializer, 'serializer', $service);
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

    /**
     * @test
     */
    public function constructorShouldCreateASerializerWhenItWasntInformed()
    {
        $service = $this->getMockForAbstractClass(
            Service::class,
            [$this->credentials, $this->client]
        );
        $this->assertAttributeInstanceOf(SerializerInterface::class, 'serializer', $service);
    }
}
