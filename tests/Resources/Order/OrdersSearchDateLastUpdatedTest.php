<?php

namespace Dsc\MercadoLivre\Resources\Order;

use Dsc\MercadoLivre\Client;
use Dsc\MercadoLivre\Environment;
use Dsc\MercadoLivre\MeliInterface;
use GuzzleHttp\Psr7\Stream;

class OrdersSearchDateLastUpdatedTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function shouldReturnDateLastUpdatedWithDayOfYear()
    {
        /** @var OrdersList */
        $orderList = $this->getOrdersListByStream($this->getStreamByDate('2020-04-09T21:18:26.708Z'));

        /** @var Order */
        $order = $orderList->getResults()->first();
        $this->assertInstanceOf(Order::class, $order);

        $this->assertEquals("2020-04-09 21:18:26.708000", $order->getDateLastUpdated()->format('Y-m-d H:i:s.u'));
    }

    /**
     * @test
     */
    public function shouldReturnDateLastUpdatedWithoutDayOfYear()
    {
        /** @var OrdersList */
        $orderList = $this->getOrdersListByStream($this->getStreamByDate('2020-04-09T21:18:26.000-04:00'));

        /** @var Order */
        $order = $orderList->getResults()->first();
        $this->assertInstanceOf(Order::class, $order);

        $this->assertEquals("2020-04-09 21:18:26.000000", $order->getDateLastUpdated()->format('Y-m-d H:i:s.u'));
    }

    /**
     * @param Stream $stream
     * @return OrdersList
     */
    public function getOrdersListByStream(Stream $stream)
    {
        $meli = $this->createMock(MeliInterface::class);
        $meli->expects($this->any())
            ->method('getEnvironment')
            ->willReturn($this->getMockForAbstractClass(Environment::class));

        $client = $this->createMock(Client::class);
        $client->expects($this->any())
            ->method('get')
            ->willReturn($stream);

        /** @var OrderService $service */
        $service = $this->getMockForAbstractClass(OrderService::class, [$meli, $client]);
        return $service->findOrdersBySeller('123456');
    }

    /**
     * @return Stream
     */
    public function getStreamByDate($date)
    {
        $json = sprintf('{"results": [{"date_last_updated": "%s"}]}', $date);
        $stream = fopen('data://text/json,' . $json, 'r');
        return new Stream($stream);
    }
}
