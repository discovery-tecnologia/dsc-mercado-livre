<?php
namespace Dsc\MercadoLivre\Http;

class MeliResourceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var MeliResourceInterface
     */
    private $resource;

    protected function setUp()
    {
        $this->resource = $this->getMockForAbstractClass(AbstractMeliResource::class);
    }

    /**
     * @test
     */
    public function shouldReturnUrl()
    {
        $this->resource->setPath('http://test.com');
        $this->assertEquals('http://test.com', $this->resource->getPath());
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