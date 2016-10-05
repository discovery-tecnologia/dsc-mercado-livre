<?php
namespace Dsc\MercadoLivre\Requests;

class ServiceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function constructorCanReceiveNullParams()
    {
        $service = $this->createMock(Service::class);
        $this->assertAttributeSame(null, 'meli', $service);
        $this->assertAttributeSame(null, 'client', $service);
    }
}