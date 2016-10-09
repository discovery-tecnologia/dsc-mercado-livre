<?php
namespace Dsc\MercadoLivre\Publish\Product;

use Dsc\MercadoLivre\Http\RequestBuilder;
use Dsc\MercadoLivre\Parser\ParserSerializer;

class ProductTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @param $expected
     * @dataProvider provider
     */
    public function productShouldReturnFieldsInJsonFormats($expected)
    {
        $product = new Product();
        $product->setTitle('Item de test - no offer')
                ->setCategoryId('MLB46585')
                ->setPrice(100)
                ->setCurrencyId('BRL')
                ->setAvailableQuantity(10)
                ->setBuyingMode('buy_it_now')
                ->setListingTypeId('gold_special')
                ->setCondition('new')
                ->setDescription('Test item - no offer')
                ->setVideoId('YOUTUBE_ID_HERE')
                ->setWarranty('12 months');

        $picture = new Picture();
        $picture->setSource('http://example.com/image.jpg');
        $product->addPicture($picture);

        $requestBuilder = new RequestBuilder($product, new ParserSerializer());

        $this->assertEquals($expected, $requestBuilder->getRequest());
    }

    /**
     * @return string
     */
    public function provider()
    {
        return [[file_get_contents(__DIR__ . '/product.json')]];
    }
}