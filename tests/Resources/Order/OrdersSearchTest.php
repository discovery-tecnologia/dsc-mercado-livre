<?php
namespace Dsc\MercadoLivre\Resources\Order;

use Dsc\MercadoLivre\Client;
use Dsc\MercadoLivre\Environment;
use Dsc\MercadoLivre\MeliInterface;
use Dsc\MercadoLivre\Resources\Page\Paging;
use GuzzleHttp\Psr7\Stream;

class OrdersSearchTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var OrdersList
     */
    protected $orders;

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

        /** @var OrderService $service */
        $service = $this->getMockForAbstractClass(OrderService::class, [$meli, $client]);
        $this->orders = $service->findOrdersBySeller('123456');
    }

    /**
     * @test
     */
    public function assertingResultAttributes()
    {
        /** @var OrdersList $order */
        $result = $this->orders;
        $this->assertInstanceOf(OrdersList::class, $result);
        $this->assertEquals("", $result->getQuery());
        $this->assertEquals("complete", $result->getDisplay());
    }

    /**
     * @test
     */
    public function assertingPagingResultAttributes()
    {
        /** @var OrdersList $order */
        $result = $this->orders;
        $paging = $result->getPaging();
        $this->assertInstanceOf(Paging::class, $paging);
        $this->assertEquals(1, $paging->getTotal());
        $this->assertEquals(0, $paging->getOffset());
        $this->assertEquals(50, $paging->getLimit());
    }

    /**
     * @test
     */
    public function assertingOrdersMappingAttributes()
    {
        /** @var Order $order */
        $order = $this->orders->getResults()->first();
        $this->assertInstanceOf(Order::class, $order);
        $this->assertEquals(1068825849, $order->getId());
        $this->assertEquals("test comment", $order->getComments());
        $this->assertEquals("paid", $order->getStatus());
        // Status Detail
        $this->assertEquals("just paid", $order->getStatusDetail()->getDescription());
        $this->assertEquals("123", $order->getStatusDetail()->getCode());
        $this->assertEquals("2016-02-25", $order->getDateCreated()->format("Y-m-d"));
        $this->assertEquals("2016-02-25", $order->getDateClosed()->format("Y-m-d"));
        $this->assertEquals(10, $order->getTotalAmount());
        $this->assertEquals("ARS", $order->getCurrencyId());
        $this->assertEquals(["not_delivered", "paid"], $order->getTags());
    }

    /**
     * @return Stream
     */
    public function getData()
    {
        $json = file_get_contents(__DIR__ . '/orders.json');
        $stream = fopen('data://text/json,' . $json, 'r');
        return new Stream($stream);
    }
}