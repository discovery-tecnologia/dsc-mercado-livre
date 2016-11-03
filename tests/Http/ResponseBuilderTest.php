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
     * @var string
     */
    private $target;

    /**
     * @var SerializerInterface
     */
    private $serializer;

    protected function setUp()
    {
        $this->response   = $this->createMock(StreamInterface::class);
        $this->response->expects($this->any())
                       ->method('getContents')
                       ->willReturn('string');
        $this->target     = 'Namespace\\Class\\JmsMapping';
        $this->serializer = $this->createMock(SerializerInterface::class);
    }

    /**
     * @test
     */
    public function constructorShouldConfigureAttributes()
    {
        $service = $this->getMockForAbstractClass(
            ResponseBuilder::class,
            [$this->response, $this->target, $this->serializer]
        );
        $this->assertAttributeSame($this->response, 'response', $service);
        $this->assertAttributeSame($this->target, 'target', $service);
        $this->assertAttributeSame($this->serializer, 'serializer', $service);
    }
}