<?php
/**
 * @author Diego Wagner <diegowagner4@gmail.com>
 */
namespace Dsc\MercadoLivre;

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
        $this->meli   = $this->createMock(MeliInterface::class);
        $this->meli->expects($this->any())
                   ->method('getEnvironment')
                   ->willReturn($this->getMockForAbstractClass(Environment::class));

        $this->client = $this->createMock(Client::class);
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