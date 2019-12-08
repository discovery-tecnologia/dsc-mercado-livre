<?php
namespace Dsc\MercadoLivre\Requests\Category;

use Doctrine\Common\Collections\Collection;
use Dsc\MercadoLivre\Client;
use Dsc\MercadoLivre\Environment;
use Dsc\MercadoLivre\MeliInterface;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Stream;

class CategoryTest extends \PHPUnit_Framework_TestCase
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
        $this->category = $service->findCategory("MLB5672");
    }

    /**
     * @test
     */
    public function assertingCategoryMappingAttributes()
    {
        $this->assertInstanceOf(Category::class, $this->category);
        $this->assertEquals("MLB5672", $this->category->getId());
        $this->assertEquals("Accessories for Vehicles", $this->category->getName());
        $this->assertEquals("http://example.com/category/images.png", $this->category->getPicture());
        $this->assertEquals("http://example.com.br/veiculos-acessorios/", $this->category->getPermalink());
        $this->assertEquals(9950683, $this->category->getTotalItemsInThisCategory());
        $this->assertEquals("none", $this->category->getAttributeTypes());
        $this->assertEquals(null, $this->category->getMetaCategId());
    }

    /**
     * @test
     */
    public function assertingRootPathCategoryMappingAttributes()
    {
        $items = $this->category->getPathFromRoot();
        $this->assertInstanceOf(Collection::class, $items);
        /** @var PathFromRoot $item */
        $item = $items->first();
        $this->assertEquals("MLB5672123123", $item->getId());
        $this->assertEquals("Accessories for Vehicles", $item->getName());
    }

    /**
     * @test
     */
    public function assertingChildrenCategoriesMappingAttributes()
    {
        $items = $this->category->getChildrenCategories();
        $this->assertInstanceOf(Collection::class, $items);
        /** @var Category $item */
        $item = $items->first();
        $this->assertEquals("MLB6005321", $item->getId());
        $this->assertEquals("Nautical Accessories", $item->getName());
        $this->assertEquals(32202, $item->getTotalItemsInThisCategory());
    }

    /**
     * @test
     */
    public function assertingSettingsInCategoryMappingAttributes()
    {
        $this->assertInstanceOf(Settings::class, $this->category->getSettings());
        $this->assertFalse($this->category->getSettings()->isAdultContent());
        $this->assertTrue($this->category->getSettings()->isBuyingAllowed());
        $this->assertEquals(["auction", "buy_it_now"], $this->category->getSettings()->getBuyingModes());
        $this->assertEquals("not_allowed", $this->category->getSettings()->getCoverageAreas());
        $this->assertEquals(["BRL"], $this->category->getSettings()->getCurrencies());
        $this->assertFalse($this->category->getSettings()->isFragile());
        $this->assertEquals("optional", $this->category->getSettings()->getImmediatePayment());
        $this->assertEquals(["not_specified", "new", "used"], $this->category->getSettings()->getItemConditions());
        $this->assertFalse($this->category->getSettings()->isItemsReviewsAllowed());
        $this->assertFalse($this->category->getSettings()->isListingAllowed());
        $this->assertEquals(50000, $this->category->getSettings()->getMaxDescriptionLength());
        $this->assertEquals(12, $this->category->getSettings()->getMaxPicturesPerItem());
        $this->assertEquals(6, $this->category->getSettings()->getMaxPicturesPerItemVar());
        $this->assertEquals(70, $this->category->getSettings()->getMaxSubTitleLength());
        $this->assertEquals(60, $this->category->getSettings()->getMaxTitleLength());
        $this->assertEquals(1, $this->category->getSettings()->getMinimumPrice());
        $this->assertEquals(20000, $this->category->getSettings()->getMaximumPrice());
        $this->assertEquals("test mirror", $this->category->getSettings()->getMirrorCategory());
        $this->assertEquals("test master mirror", $this->category->getSettings()->getMirrorMasterCategory());
        $this->assertEquals([], $this->category->getSettings()->getMirrorSlaveCategories());
        $this->assertEquals("required", $this->category->getSettings()->getPrice());
        $this->assertEquals([], $this->category->getSettings()->getRestrictions());
        $this->assertFalse($this->category->getSettings()->isRoundedAddress());
        $this->assertEquals("not_allowed", $this->category->getSettings()->getSellerContact());
        $this->assertEquals(["not_specified", "custom", "me1"], $this->category->getSettings()->getShippingModes());
        $this->assertEquals(["custom"], $this->category->getSettings()->getShippingOptions());
        $this->assertEquals("optional", $this->category->getSettings()->getShippingProfile());
        $this->assertFalse($this->category->getSettings()->isShowContactInformation());
        $this->assertEquals("optional", $this->category->getSettings()->getSimpleShipping());
        $this->assertEquals("required", $this->category->getSettings()->getStock());
        $this->assertEquals("optional", $this->category->getSettings()->getSubVertical());
        $this->assertEquals(["tag"], $this->category->getSettings()->getTags());
        $this->assertEquals("optional", $this->category->getSettings()->getVertical());
        $this->assertEquals("produto", $this->category->getSettings()->getVipSubdomain());
    }

    /**
     * @return Stream
     */
    public function getData()
    {
        $json = file_get_contents(__DIR__ . '/fixtures/category.json');
        $stream = fopen('data://text/json,' . $json, 'r');
        return new Stream($stream);
    }
}