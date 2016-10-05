<?php
namespace Dsc\MercadoLivre\Resources;

use Dsc\MercadoLivre\Environment;
use Dsc\MercadoLivre\MeliInterface;

class ServiceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var MeliInterface
     */
    protected $meli;

    protected function setUp()
    {
        $this->meli = $this->createMock(MeliInterface::class);
        $this->meli->expects($this->any())
             ->method('getEnvironment')
             ->willReturn($this->getMockForAbstractClass(Environment::class));
    }

    /**
     * @test
     */
    public function constructorShouldConfigureMeliAttribute()
    {
        $service = new Service($this->meli);
        $this->assertInstanceOf(MeliInterface::class, $service->getMeli());
    }
}