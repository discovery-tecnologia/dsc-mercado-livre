<?php


namespace Requests\Trends;


use Dsc\MercadoLivre\Client;
use Dsc\MercadoLivre\Environment;
use Dsc\MercadoLivre\Environments\Site;
use Dsc\MercadoLivre\MeliInterface;
use Dsc\MercadoLivre\Requests\Trends\Trend;
use Dsc\MercadoLivre\Requests\Trends\TrendsService;
use GuzzleHttp\Psr7\Stream;
use Doctrine\Common\Collections\Collection;

class TrendsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Collection
     */
    protected $trends;

    public function setUp()
    {
        $data = $this->getData();
        $meli = $this->createMock(MeliInterface::class);
        $meli->expects($this->any())
            ->method('getEnvironment')
            ->willReturn($this->getMockForAbstractClass(Environment::class));

        $client = $this->createMock(Client::class);
        $client->expects($this->any())
            ->method('get')
            ->willReturn($data);

        /** @var TrendsService $service */
        $service = $this->getMockForAbstractClass(TrendsService::class, [$meli, $client]);
        $this->trends = $service->findTrend(Site::BRASIL);
    }

    /**
     * @return Stream
     */
    public function getData()
    {
        $json = file_get_contents(__DIR__ . '/fixtures/trends.json');
        $stream = fopen('data://text/json,' . $json, 'r');

        return new Stream($stream);
    }

    /**
     * @test
     */
    public function assertingResultAttributes()
    {
        $this->assertInstanceOf(Collection::class, $this->trends);
        $this->assertContainsOnlyInstancesOf(Trend::class, $this->trends);
    }

    /**
     * @test
     */
    public function assertingAttributeMappingAttributes()
    {
        /** @var Trend $trend */
        $trend = $this->trends->first();

        $this->assertInstanceOf(Trend::class, $trend);
        $this->assertEquals('zapatillas hombre', $trend->getKeyword());
        $this->assertEquals('https://zapatillas.mercadolibre.com.ar/hombre/zapatillas-hombre', $trend->getUrl());
    }
}