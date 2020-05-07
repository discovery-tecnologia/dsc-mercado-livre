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
     * @var Category
     */
    protected $category;

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
        $this->category = $service->findCategoryPredictor(Site::BRASIL, 'porta');
    }

    /**
     * @test
     */
    public function assertingCategoryMappingAttributes()
    {
        $this->assertInstanceOf(Category::class, $this->category);
        $this->assertEquals("MLB179703", $this->category->getId());
        $this->assertEquals("Portas", $this->category->getName());
        $this->assertEmpty($this->category->getPicture());
        $this->assertEmpty($this->category->getPermalink());
        $this->assertEmpty($this->category->getTotalItemsInThisCategory());
        $this->assertInstanceOf(Collection::class, $this->category->getPathFromRoot());
        $this->assertEmpty($this->category->getChildrenCategories());
        $this->assertEmpty($this->category->getAttributeTypes());
        $this->assertEmpty($this->category->getSettings());
        $this->assertEmpty($this->category->getMetaCategId());
        $this->assertEmpty($this->category->isAttributable());
    }

    /**
     * @test
     */
    public function assertingRootPathCategoryMappingAttributes()
    {
        $items = $this->category->getPathFromRoot();
        $this->assertInstanceOf(Collection::class, $items);
        $this->assertContainsOnlyInstancesOf(PathFromRoot::class, $items->toArray());

        /** @var PathFromRoot $item */
        $item = $items->first();
        $this->assertInstanceOf(PathFromRoot::class, $item);
        $this->assertEquals("MLB263532", $item->getId());
        $this->assertEquals("Ferramentas e Construção", $item->getName());
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
