<?php

namespace Dsc\MercadoLivre\Requests\Category;

use Doctrine\Common\Collections\Collection;
use Dsc\MercadoLivre\Client;
use Dsc\MercadoLivre\Environment;
use Dsc\MercadoLivre\MeliInterface;
use GuzzleHttp\Psr7\Stream;

class SaleTermTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Collection<Dsc\MercadoLivre\Requests\Category\SaleTerm>
     */
    protected $saleTerms;

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
        $this->saleTerms = $service->findCategorySaleTerms("MLB5672");
    }

    /**
     * @test
     */
    public function assertingResultSaleTerms()
    {
        $this->assertInstanceOf(Collection::class, $this->saleTerms);
        $this->assertContainsOnlyInstancesOf(SaleTerm::class, $this->saleTerms);
    }

    /**
     * @test
     */
    public function assertingAttributeMappingSaleTerms()
    {
        /** @var SaleTerm $saleTerm */
        $saleTerm = $this->saleTerms->first();

        $this->assertInstanceOf(SaleTerm::class, $saleTerm);
        $this->assertEquals('INVOICE', $saleTerm->getId());
        $this->assertEquals('Faturamento', $saleTerm->getName());
        $this->assertEquals('SALE_TERMS', $saleTerm->getHierarchy());
        $this->assertEquals(1, $saleTerm->getRelevance());
        $this->assertEquals('list', $saleTerm->getValueType());
    }

    /**
     * @test
     */
    public function assertingTagMappingSaleTerms()
    {
        /** @var SaleTerm $saleTerm */
        $saleTerm = $this->saleTerms->first();

        $tags = $saleTerm->getTags();

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
        $this->assertFalse($tags->isReadOnly());
        $this->assertFalse($tags->isRequired());
        $this->assertFalse($tags->isRestrictedValues());
        $this->assertFalse($tags->isVariationAttribute());
    }

    /**
     * @test
     */
    public function assertingAttributeValuesMappingSaleTerms()
    {
        $values = $this->saleTerms->first()->getValues();
        $this->assertInstanceOf(Collection::class, $values);
        $this->assertContainsOnlyInstancesOf(SaleTermValue::class, $values->toArray());

        /** @var SaleTermValue $item */
        $value = $values->first();
        $this->assertEquals('6891885', $value->getId());
        $this->assertEquals('Factura A', $value->getName());
    }

    /**
     * @test
     */
    public function assertingAllowedUnitsMappingSaleTerms()
    {
        $allowedUnits = $this->saleTerms->last()->getAllowedUnits();
        $this->assertInstanceOf(Collection::class, $allowedUnits);
        $this->assertContainsOnlyInstancesOf(AllowedUnit::class, $allowedUnits->toArray());

        /** @var AllowedUnit $item */
        $item = $allowedUnits->first();
        $this->assertEquals('dias', $item->getId());
        $this->assertEquals('dias', $item->getName());
    }

    /**
     * @return Stream
     */
    public function getData()
    {
        $json = file_get_contents(__DIR__ . '/fixtures/sale-terms.json');
        $stream = fopen('data://text/json,' . $json, 'r');
        return new Stream($stream);
    }
}
