<?php
namespace Dsc\MercadoLivre\Publisher;

use Dsc\MercadoLivre\Announcement\Item;
use Dsc\MercadoLivre\Announcement\Picture;
use Dsc\MercadoLivre\Http\RequestBuilder;
use Dsc\MercadoLivre\Parser\ParserSerializer;

class AnnouncementTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @param $expected
     * @dataProvider provider
     */
    public function AnnouncementShouldReturnFieldsInJsonFormats($expected)
    {
        $Announcement = new Item();
        $Announcement->setTitle('Item de test - no offer')
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
        $Announcement->addPicture($picture);

        $requestBuilder = new RequestBuilder($Announcement, new ParserSerializer());

        $this->assertEquals($expected, $requestBuilder->toJson());
    }

    /**
     * @return string
     */
    public function provider()
    {
        return [[file_get_contents(__DIR__ . '/announcement.json')]];
    }
}