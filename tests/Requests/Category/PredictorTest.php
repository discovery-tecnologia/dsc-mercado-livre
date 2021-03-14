<?php

namespace Dsc\MercadoLivre\Requests\Category;

use Doctrine\Common\Collections\Collection;
use Dsc\MercadoLivre\Client;
use Dsc\MercadoLivre\Environment;
use Dsc\MercadoLivre\Environments\Site;
use Dsc\MercadoLivre\MeliInterface;
use GuzzleHttp\Psr7\Stream;

class PredictorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Collection
     */
    protected $predictors;

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

        /** @var CategoryService $service */
        $service = $this->getMockForAbstractClass(CategoryService::class, [$meli, $client]);
        $this->predictors = $service->findCategoryPredictor(Site::BRASIL, 'porta');
    }

    /**
     * @test
     */
    public function assertingCategoryMappingAttributes()
    {
        $this->assertInstanceOf(Collection::class, $this->predictors);
        $predictor = $this->predictors->first();
        $this->assertInstanceOf(Predictor::class, $predictor);
        $this->assertEquals("MLA-CELLPHONES", $predictor->getDomainId());
        $this->assertEquals("Celulares", $predictor->getDomainName());
        $this->assertEquals("MLA1055", $predictor->getCategoryId());
        $this->assertEquals("Celulares y Smartphones", $predictor->getCategoryName());
    }

    /**
     * @test
     */
    public function assertingAttributeCombinationCategoryMappingAttributes()
    {
        $predictor = $this->predictors->first();
        $items = $predictor->getAttributes();
        $this->assertInstanceOf(Collection::class, $items);
        $this->assertContainsOnlyInstancesOf(AttributeCombination::class, $items->toArray());

        /** @var PathFromRoot $item */
        $item = $items->first();
        $this->assertInstanceOf(AttributeCombination::class, $item);
        $this->assertEquals("BRAND", $item->getId());
        $this->assertEquals("9344", $item->getValueId());
        $this->assertEquals("Apple", $item->getValueName());
    }

    /**
     * @return Stream
     */
    public function getData()
    {
        $json = file_get_contents(__DIR__ . '/fixtures/predictor.json');
        $stream = fopen('data://text/json,' . $json, 'r');
        return new Stream($stream);
    }
}
