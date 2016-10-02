<?php
/**
 * @author Diego Wagner <diegowagner4@gmail.com>
 */
namespace Dsc\MercadoLivre;

use Dsc\MercadoLivre\Parser\SerializerInterface;

class BaseServiceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var MeliInterface
     */
    protected $meli;

    /**
     * @var Client|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $client;

    protected function setUp()
    {
        $this->meli   = new Meli('client-id', 'client-secret');
        $this->client = $this->createMock(Client::class);
    }

    /**
     * @test
     */
    public function baseServiceShouldReceiveParametersNullWhenAccessIsPublic()
    {
        $service = $this->getMockForAbstractClass(
            BaseService::class,
            [null]
        );
        $this->assertAttributeSame(null, 'meli', $service);
    }

    /**
     * @test
     */
    public function constructorShouldConfigureAttributes()
    {
        $service = $this->getMockForAbstractClass(
            BaseService::class,
            [$this->meli, $this->client]
        );
        $this->assertAttributeSame($this->meli, 'meli', $service);
        $this->assertAttributeSame($this->client, 'client', $service);
    }

    /**
     * @test
     */
    public function constructorShouldCreateAClientWhenItWasntInformed()
    {
        $service = $this->getMockForAbstractClass(
            BaseService::class,
            [$this->meli]
        );
        $this->assertAttributeInstanceOf(Client::class, 'client', $service);
    }
}