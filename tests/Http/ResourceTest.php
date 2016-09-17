<?php
namespace Dsc\MercadoLivre\Http;

class ResourceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ResourceInterface
     */
    private $resource;

    protected function setUp()
    {
        $this->resource = $this->getMockForAbstractClass(AbstractResource::class);
    }

    /**
     * @test
     */
    public function shouldReturnUrl()
    {
        $this->resource->setUrl('http://test.com');
        $this->assertEquals('http://test.com', $this->resource->getUrl());
    }

    /**
     * @test
     */
    public function shouldReturnParamsAsArray()
    {
        $this->resource->add('param_1', 'value_1')
                       ->add('param_2', 'value_2');

        $this->assertTrue(is_array($this->resource->getParams()));
        $this->assertEquals([
                'param_1' => 'value_1',
                'param_2' => 'value_2'
        ], $this->resource->getParams());
    }
}