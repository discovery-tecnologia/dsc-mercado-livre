<?php
namespace Dsc\MercadoLivre\Parser;

class ParserSerializerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var SerializerInterface
     */
    private $parser;

    protected function setUp()
    {
        $this->parser = $this->createMock(SerializerInterface::class);
        $this->parser->expects($this->any())
                     ->method('serialize')
                     ->willReturn('{"data":"test"}');

        $result = new \stdClass();
        $result->data = 'test';
        $this->parser->expects($this->any())
            ->method('deserialize')
            ->willReturn($result);
    }

    /**
     * @test
     */
    public function serializeShouldReturnCorrectFormat()
    {
        $object = new \stdClass();
        $object->data = 'test';
        $result = $this->parser->serialize($object, Formatter::JSON);

        $this->assertEquals('{"data":"test"}', $result);
    }

    /**
     * @test
     */
    public function deserializeShouldReturnCorrectFormat()
    {
        $data = ['data' => 'test'];
        $result = $this->parser->deserialize($data, Formatter::JSON);

        $this->assertEquals("test", $result->data);
    }
}