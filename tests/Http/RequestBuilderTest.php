<?php
namespace Dsc\MercadoLivre\Http;

use Dsc\MercadoLivre\Parser\SerializerInterface;

class RequestBuilderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var mixed
     */
    private $data;

    /**
     * @var SerializerInterface
     */
    private $serializer;

    protected function setUp()
    {
        $this->data = ['test'];
        $this->serializer = $this->createMock(SerializerInterface::class);
    }

    /**
     * @test
     */
    public function constructorShouldConfigureAttributes()
    {
        $service = $this->getMockForAbstractClass(
            RequestBuilder::class,
            [$this->data, $this->serializer]
        );
        $this->assertAttributeSame($this->data, 'data', $service);
        $this->assertAttributeSame($this->serializer, 'serializer', $service);
    }
}