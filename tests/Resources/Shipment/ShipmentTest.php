<?php

namespace Dsc\MercadoLivre\Resources\Shipment;

use Dsc\MercadoLivre\Client;
use Dsc\MercadoLivre\Environment;
use Dsc\MercadoLivre\MeliInterface;
use Dsc\MercadoLivre\Resources\Shipment\Address\City;
use Dsc\MercadoLivre\Resources\Shipment\Address\Country;
use Dsc\MercadoLivre\Resources\Shipment\Address\Municipality;
use Dsc\MercadoLivre\Resources\Shipment\Address\Neighborhood;
use Dsc\MercadoLivre\Resources\Shipment\Address\State;
use Dsc\MercadoLivre\Resources\Shipment\Option\EstimatedDelivery;
use Dsc\MercadoLivre\Resources\Shipment\Option\EstimatedDeliveryTime;
use Dsc\MercadoLivre\Resources\Shipment\Option\Option;
use GuzzleHttp\Psr7\Stream;

class ShipmentTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Shipment
     */
    protected $shipment;

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
        $service = $this->getMockForAbstractClass(ShipmentService::class, [$meli, $client]);
        $this->shipment = $service->findShipment('123');
    }

    /**
     * @test
     */
    public function assertingShipmentMappingAttributes()
    {
        $this->assertInstanceOf(Shipment::class, $this->shipment);
        $this->assertEquals(30024984097, $this->shipment->getId());
        $this->assertEquals("me2", $this->shipment->getMode());
        $this->assertEquals("receiver", $this->shipment->getCreatedBy());
        $this->assertEquals(2460122623, $this->shipment->getOrderId());
        $this->assertEquals(2550, $this->shipment->getOrderCost());
        $this->assertEquals(18.9, $this->shipment->getBaseCost());
        $this->assertEquals("MLB", $this->shipment->getSiteId());
        $this->assertEquals("ready_to_ship", $this->shipment->getStatus());
        $this->assertEquals("ready_to_print", $this->shipment->getSubstatus());
        $this->assertEquals("2020-05-22", $this->shipment->getDateCreated()->format("Y-m-d"));
        $this->assertEquals("2020-05-22", $this->shipment->getLastUpdated()->format("Y-m-d"));
        $this->assertEquals("1010101589653", $this->shipment->getTrackingNumber());
        $this->assertEquals("Sedex", $this->shipment->getTrackingMethod());
        $this->assertEquals(22, $this->shipment->getServiceId());
        $this->assertEmpty($this->shipment->getCarrierInfo());
        $this->assertEquals(567868047, $this->shipment->getSenderId());
        $this->assertEquals(567917311, $this->shipment->getReceiverId());
        $this->assertEmpty($this->shipment->getComments());
        $this->assertEmpty($this->shipment->getDateFirstPrinted());
        $this->assertEquals("MELI", $this->shipment->getMarketPlace());
        $this->assertEmpty($this->shipment->getReturnDetails());
        $this->assertEquals(["test_shipment"], $this->shipment->getTags());
        $this->assertEquals(["handling_delayed"], $this->shipment->getDelay());
        $this->assertEquals("forward", $this->shipment->getType());
        $this->assertEquals("drop_off", $this->shipment->getLogisticType());
        $this->assertEmpty($this->shipment->getApplicationId());
        $this->assertEmpty($this->shipment->getReturnTrackingNumber());
    }

    /**
     * @test
     */
    public function assertingStatusHistoryInShipmentMappingAttributes()
    {
        $this->assertInstanceOf(StatusHistory::class, $this->shipment->getStatusHistory());

        /** @var StatusHistory */
        $statusHistory = $this->shipment->getStatusHistory();
        $this->assertEmpty($statusHistory->getDateCancelled());
        $this->assertEmpty($statusHistory->getDateDelivered());
        $this->assertEmpty($statusHistory->getDateFirstVisit());
        $this->assertEquals("2020-05-22 06:55:51", $statusHistory->getDateHandling()->format("Y-m-d H:i:s"));
        $this->assertEmpty($statusHistory->getDateNotDelivered());
        $this->assertEquals("2020-05-22 06:55:51", $statusHistory->getDateReadyToShip()->format("Y-m-d H:i:s"));
        $this->assertEmpty($statusHistory->getDateShipped());
        $this->assertEmpty($statusHistory->getDateReturned());
    }

    /**
     * @test
     */
    public function assertingSenderAddressInShipmentMappingAttributes()
    {
        $this->assertInstanceOf(SenderAddress::class, $this->shipment->getSenderAddress());

        /** @var SenderAddress */
        $senderAddress = $this->shipment->getSenderAddress();
        $this->assertEquals(1105171985, $senderAddress->getId());
        $this->assertEquals("XXXXXXX", $senderAddress->getAddressLine());
        $this->assertEquals("XXXXXXX", $senderAddress->getStreetName());
        $this->assertEquals("XXXXXXX", $senderAddress->getStreetNumber());
        $this->assertEmpty($senderAddress->getComment());
        $this->assertEquals("91569210", $senderAddress->getZipCode());
        $this->assertEmpty($senderAddress->getAgency());
        $this->assertEquals(["billing", "default_selling_address", "shipping"], $senderAddress->getTypes());
        $this->assertEquals(0, $senderAddress->getLatitude());
        $this->assertEquals(0, $senderAddress->getLongitude());
        $this->assertEquals("GEOMETRIC_CENTER", $senderAddress->getGeolocationType());
        $this->assertEquals("2020-05-21 09:57:49", $senderAddress->getGeolocationLastUpdated()->format("Y-m-d H:i:s"));
        $this->assertEquals("google-maps", $senderAddress->getGeolocationSource());

        $this->assertInstanceOf(City::class, $senderAddress->getCity());
        $this->assertEquals("TUxCQ1BPUjgwZTJl", $senderAddress->getCity()->getId());
        $this->assertEquals("Porto Alegre", $senderAddress->getCity()->getName());

        $this->assertInstanceOf(State::class, $senderAddress->getState());
        $this->assertEquals("BR-RS", $senderAddress->getState()->getId());
        $this->assertEquals("Rio Grande do Sul", $senderAddress->getState()->getName());

        $this->assertInstanceOf(Country::class, $senderAddress->getCountry());
        $this->assertEquals("BR", $senderAddress->getCountry()->getId());
        $this->assertEquals("Brasil", $senderAddress->getCountry()->getName());

        $this->assertInstanceOf(Neighborhood::class, $senderAddress->getNeighborhood());
        $this->assertEmpty($senderAddress->getNeighborhood()->getId());
        $this->assertEquals("Lomba do Pinheiro", $senderAddress->getNeighborhood()->getName());

        $this->assertInstanceOf(Municipality::class, $senderAddress->getMunicipality());
        $this->assertEmpty($senderAddress->getMunicipality()->getId());
        $this->assertEmpty($senderAddress->getMunicipality()->getName());
    }

    /**
     * @test
     */
    public function assertingReceiverAddressInShipmentMappingAttributes()
    {
        $this->assertInstanceOf(ReceiverAddress::class, $this->shipment->getReceiverAddress());

        /** @var ReceiverAddress */
        $receiverAddress = $this->shipment->getReceiverAddress();
        $this->assertEquals(1104239025, $receiverAddress->getId());
        $this->assertEquals("Rua Orxxxea SN", $receiverAddress->getAddressLine());
        $this->assertEquals("Rua Orxxxa", $receiverAddress->getStreetName());
        $this->assertEquals("SN", $receiverAddress->getStreetNumber());
        $this->assertEquals("Proximo A Escola", $receiverAddress->getComment());
        $this->assertEquals("91569210", $receiverAddress->getZipCode());
        $this->assertEmpty($receiverAddress->getAgency());
        $this->assertEquals(["default_buying_address"], $receiverAddress->getTypes());
        $this->assertEquals(-30.117075, $receiverAddress->getLatitude());
        $this->assertEquals(-51.112478, $receiverAddress->getLongitude());
        $this->assertEquals("GEOMETRIC_CENTER", $receiverAddress->getGeolocationType());
        $this->assertEquals("google-maps", $receiverAddress->getGeolocationSource());
        $this->assertEquals("business", $receiverAddress->getDeliveryPreference());
        $this->assertEquals("Teste Endereço", $receiverAddress->getReceiverName());
        $this->assertEquals("11 23456789", $receiverAddress->getReceiverPhone());
        $this->assertEquals(
            "2020-05-17 19:16:23",
            $receiverAddress->getGeolocationLastUpdated()->format("Y-m-d H:i:s")
        );

        $this->assertInstanceOf(City::class, $receiverAddress->getCity());
        $this->assertEquals("TUxCQ1BPUjgwZTJl", $receiverAddress->getCity()->getId());
        $this->assertEquals("Porto Alegre", $receiverAddress->getCity()->getName());

        $this->assertInstanceOf(State::class, $receiverAddress->getState());
        $this->assertEquals("BR-RS", $receiverAddress->getState()->getId());
        $this->assertEquals("Rio Grande do Sul", $receiverAddress->getState()->getName());

        $this->assertInstanceOf(Country::class, $receiverAddress->getCountry());
        $this->assertEquals("BR", $receiverAddress->getCountry()->getId());
        $this->assertEquals("Brasil", $receiverAddress->getCountry()->getName());

        $this->assertInstanceOf(Neighborhood::class, $receiverAddress->getNeighborhood());
        $this->assertEmpty($receiverAddress->getNeighborhood()->getId());
        $this->assertEquals("Lomba do Pinheiro", $receiverAddress->getNeighborhood()->getName());

        $this->assertInstanceOf(Municipality::class, $receiverAddress->getMunicipality());
        $this->assertEmpty($receiverAddress->getMunicipality()->getId());
        $this->assertEmpty($receiverAddress->getMunicipality()->getName());
    }

    /**
     * @test
     */
    public function assertingOptionInShipmentMappingAttributes()
    {
        $this->assertInstanceOf(Option::class, $this->shipment->getOption());

        /** @var Option */
        $option = $this->shipment->getOption();
        $this->assertEquals(3264369961, $option->getId());
        $this->assertEquals(182, $option->getShippingMethodId());
        $this->assertEquals("Expresso", $option->getName());
        $this->assertEquals("BRL", $option->getCurrencyId());
        $this->assertEquals(62.82, $option->getListCost());
        $this->assertEquals(0, $option->getCost());
        $this->assertEquals("estimated", $option->getDeliveryType());

        $this->assertInstanceOf(EstimatedDelivery::class, $option->getEstimatedScheduleLimit());
        $this->assertEmpty($option->getEstimatedScheduleLimit()->getDate());
        $this->assertEmpty($option->getEstimatedScheduleLimit()->getOffset());

        $this->assertInstanceOf(EstimatedDelivery::class, $option->getEstimatedDeliveryLimit());
        $this->assertEquals(240, $option->getEstimatedDeliveryLimit()->getOffset());
        $this->assertEquals(
            "2020-06-12 00:00:00",
            $option->getEstimatedDeliveryLimit()->getDate()->format("Y-m-d H:i:s")
        );

        $this->assertInstanceOf(EstimatedDelivery::class, $option->getEstimatedDeliveryFinal());
        $this->assertEquals(720, $option->getEstimatedDeliveryFinal()->getOffset());
        $this->assertEquals(
            "2020-07-13 00:00:00",
            $option->getEstimatedDeliveryFinal()->getDate()->format("Y-m-d H:i:s")
        );

        $this->assertInstanceOf(EstimatedDelivery::class, $option->getEstimatedDeliveryExtended());
        $this->assertEquals(120, $option->getEstimatedDeliveryExtended()->getOffset());
        $this->assertEquals(
            "2020-06-04 00:00:00",
            $option->getEstimatedDeliveryExtended()->getDate()->format("Y-m-d H:i:s")
        );

        $this->assertInstanceOf(EstimatedDelivery::class, $option->getEstimatedHandlingLimit());
        $this->assertEmpty($option->getEstimatedHandlingLimit()->getOffset());
        $this->assertEquals(
            "2020-05-22 00:00:00",
            $option->getEstimatedHandlingLimit()->getDate()->format("Y-m-d H:i:s")
        );

        $this->assertInstanceOf(EstimatedDeliveryTime::class, $option->getEstimatedDeliveryTime());
        $this->assertEquals("known_frame", $option->getEstimatedDeliveryTime()->getType());
        $this->assertEquals("hour", $option->getEstimatedDeliveryTime()->getUnit());
        $this->assertEquals(48, $option->getEstimatedDeliveryTime()->getShipping());
        $this->assertEquals(0, $option->getEstimatedDeliveryTime()->getHandling());
        $this->assertEmpty($option->getEstimatedDeliveryTime()->getSchedule());
        $this->assertEquals(
            "2020-05-26 00:00:00",
            $option->getEstimatedDeliveryTime()->getDate()->format("Y-m-d H:i:s")
        );
        $this->assertEquals(
            "2020-05-22 12:00:00",
            $option->getEstimatedDeliveryTime()->getPayBefore()->format("Y-m-d H:i:s")
        );
    }

    /**
     * @test
     */
    public function assertingCostComponentInShipmentMappingAttributes()
    {
        $this->assertInstanceOf(CostComponents::class, $this->shipment->getCostComponents());
        $this->assertEquals(0, $this->shipment->getCostComponents()->getSpecialDiscount());
        $this->assertEquals(0, $this->shipment->getCostComponents()->getLoyalDiscount());
        $this->assertEquals(0, $this->shipment->getCostComponents()->getCompensation());
        $this->assertEquals(0, $this->shipment->getCostComponents()->getGapDiscount());
        $this->assertEquals(81.72, $this->shipment->getCostComponents()->getRatio());
    }

    /**
     * @return Stream
     */
    public function getData()
    {
        $json = file_get_contents(__DIR__ . '/shipment.json');
        $stream = fopen('data://text/json,' . $json, 'r');
        return new Stream($stream);
    }
}
