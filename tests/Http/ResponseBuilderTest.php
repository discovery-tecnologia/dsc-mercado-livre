<?php
namespace Dsc\MercadoLivre\Http;

use Dsc\MercadoLivre\Parser\SerializerInterface;
use Psr\Http\Message\StreamInterface;

class ResponseBuilderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var StreamInterface
     */
    private $response;

    /**
     * @var SerializerInterface
     */
    private $serializer;

    protected function setUp()
    {
        $this->response   = $this->createMock(StreamInterface::class);
        $this->serializer = $this->createMock(SerializerInterface::class);
    }

    /**
     * @test
     */
    public function constructorShouldConfigureAttributes()
    {
        $service = $this->getMockForAbstractClass(
            ResponseBuilder::class,
            [$this->response, $this->serializer]
        );
        $this->assertAttributeSame($this->response, 'response', $service);
        $this->assertAttributeSame($this->serializer, 'serializer', $service);
    }
}