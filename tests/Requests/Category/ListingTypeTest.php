<?php

namespace Dsc\MercadoLivre\Requests\Category;

use Doctrine\Common\Collections\Collection;
use Dsc\MercadoLivre\Client;
use Dsc\MercadoLivre\Environment;
use Dsc\MercadoLivre\MeliInterface;
use GuzzleHttp\Psr7\Stream;

class ListingTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Collection<Dsc\MercadoLivre\Requests\Category\ListingType>
     */
    protected $listingTypes;

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
        $this->listingTypes = $service->findCategoryListingTypes("MLB5672");
    }

    /**
     * @test
     */
    public function assertingResultListingTypes()
    {
        $this->assertInstanceOf(Collection::class, $this->listingTypes);
        $this->assertContainsOnlyInstancesOf(ListingType::class, $this->listingTypes);
    }

    /**
     * @test
     */
    public function assertingListingTypeMappingAttributes()
    {
        /** @var  ListingType $listingType */
        $listingType = $this->listingTypes->first();

        $this->assertInstanceOf(ListingType::class, $listingType);
        $this->assertEquals('MLB', $listingType->getSiteId());
        $this->assertEquals('gold_pro', $listingType->getId());
        $this->assertEquals('Premium', $listingType->getName());
    }

    /**
     * @return Stream
     */
    public function getData()
    {
        $json = file_get_contents(__DIR__ . '/fixtures/listing-types.json');
        $stream = fopen('data://text/json,' . $json, 'r');
        return new Stream($stream);
    }
}
