<?php

namespace Dsc\MercadoLivre\Requests\Category;

use Doctrine\Common\Collections\Collection;
use Dsc\MercadoLivre\Client;
use Dsc\MercadoLivre\Environment;
use Dsc\MercadoLivre\MeliInterface;
use GuzzleHttp\Psr7\Stream;

class AttributeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Collection<Dsc\MercadoLivre\Requests\Category\Attribute>
     */
    protected $attributes;

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
        $this->attributes = $service->findCategoryAttributes("MLB186150");
    }

    /**
     * @test
     */
    public function assertingResultAttributes()
    {
        $this->assertInstanceOf(Collection::class, $this->attributes);
        $this->assertContainsOnlyInstancesOf(Attribute::class, $this->attributes);
    }

    /**
     * @test
     */
    public function assertingAttributeMappingAttributes()
    {
        $attribute = $this->attributes->first();

        $this->assertInstanceOf(Attribute::class, $attribute);
        $this->assertEquals('PRODUCT_FEATURES', $attribute->getId());
        $this->assertEquals('Características do produto', $attribute->getName());
        $this->assertEquals('ITEM', $attribute->getHierarchy());
        $this->assertEquals('list', $attribute->getValueType());
        $this->assertNull($attribute->getValueName());
    }

    /**
     * @test
     */
    public function assertingTagMappingAttributes()
    {
        $attribute = $this->attributes->first();
        $tags = $attribute->getTags();

        $this->assertInstanceOf(Tag::class, $tags);
        $this->assertFalse($tags->isAllowVariations());
        $this->assertFalse($tags->isDefinesPicture());
        $this->assertFalse($tags->isCatalogRequired());
        $this->assertFalse($tags->isFixed());
        $this->assertTrue($tags->isHidden());
        $this->assertFalse($tags->isInferred());
        $this->assertTrue($tags->isMultivalued());
        $this->assertFalse($tags->isOthers());
        $this->assertFalse($tags->isProductPk());
        $this->assertTrue($tags->isReadOnly());
        $this->assertFalse($tags->isRequired());
        $this->assertFalse($tags->isRestrictedValues());
        $this->assertFalse($tags->isVariationAttribute());
    }

    /**
     * @test
     */
    public function assertingAttributeValuesMappingAttributes()
    {
        $items = $this->attributes->first()->getValues();
        $this->assertInstanceOf(Collection::class, $items);
        $this->assertContainsOnlyInstancesOf(AttributeValue::class, $items->toArray());

        /** @var AttributeValue $item */
        $item = $items->first();
        $this->assertEquals('7435885', $item->getId());
        $this->assertEquals('Contém líquido', $item->getName());
    }

    /**
     * @return Stream
     */
    public function getData()
    {
        $json = file_get_contents(__DIR__ . '/attributes.json');
        $stream = fopen('data://text/json,' . $json, 'r');
        return new Stream($stream);
    }
}
