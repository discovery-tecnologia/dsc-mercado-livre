<?php
namespace Dsc\MercadoLivre\Requests\Currency;

use Dsc\MercadoLivre\Client;
use Dsc\MercadoLivre\Environment;
use Dsc\MercadoLivre\MeliInterface;
use GuzzleHttp\Psr7\Stream;

class CurrencyTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Currency
     */
    protected $currency;

    protected function setUp()
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

        /** @var CurrencyService $service */
        $service = $this->getMockForAbstractClass(CurrencyService::class, [$meli, $client]);
        $this->currency = $service->findCurrency("ARS");
    }

    /**
     * @test
     */
    public function assertingCategoryMappingAttributes()
    {
        $this->assertInstanceOf(Currency::class, $this->currency);
        $this->assertEquals("ARS", $this->currency->getId());
        $this->assertEquals("$", $this->currency->getSymbol());
        $this->assertEquals("Peso argentino", $this->currency->getDescription());
        $this->assertEquals(2, $this->currency->getDecimalPlaces());
    }

    /**
     * @return Stream
     */
    public function getData()
    {
        $json = file_get_contents(__DIR__ . '/currency.json');
        $stream = fopen('data://text/json,' . $json, 'r');
        return new Stream($stream);
    }
}