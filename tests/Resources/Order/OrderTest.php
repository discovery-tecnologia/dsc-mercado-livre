<?php
namespace Dsc\MercadoLivre\Resources\Order;

use Doctrine\Common\Collections\Collection;
use Dsc\MercadoLivre\Client;
use Dsc\MercadoLivre\Environment;
use Dsc\MercadoLivre\MeliInterface;
use Dsc\MercadoLivre\Requests\Address\City;
use Dsc\MercadoLivre\Requests\Address\Country;
use Dsc\MercadoLivre\Requests\Address\State;
use Dsc\MercadoLivre\Resources\Buyer\BillingInfo;
use Dsc\MercadoLivre\Resources\Buyer\Buyer;
use Dsc\MercadoLivre\Resources\Buyer\Phone as PhoneBuyer;
use Dsc\MercadoLivre\Resources\Feedback\Feedback;
use Dsc\MercadoLivre\Resources\Payment\Payment;
use Dsc\MercadoLivre\Resources\Seller\Phone as PhoneSeller;
use Dsc\MercadoLivre\Resources\Seller\Seller;
use Dsc\MercadoLivre\Resources\Shipping\ReceiverAddress;
use Dsc\MercadoLivre\Resources\Shipping\Shipping;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Stream;

class OrderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Order
     */
    protected $order;

    protected function setUp()
    {
        $data = $this->getData();
        $meli = $this->createMock(MeliInterface::class);
        $meli->expects($this->any())
             ->method('getEnvironment')
             ->willReturn($this->getMockForAbstractClass(Environment::class));

        $response = $this->createMock(Response::class);
        $response->expects($this->any())
                 ->method('getBody')
                 ->willReturn($data);

        $client = $this->createMock(Client::class);
        $client->expects($this->any())
               ->method('get')
               ->willReturn($response);

        /** @var OrderService $service */
        $service = $this->getMockForAbstractClass(OrderService::class, [$meli, $client]);
        $this->order = $service->findOrder('123');
    }

    /**
     * @test
     */
    public function assertingOrderMappingAttributes()
    {
        $this->assertInstanceOf(Order::class, $this->order);
        $this->assertEquals(768570754, $this->order->getId());
        $this->assertEquals("paid", $this->order->getStatus());
        $this->assertEquals("2013-05-27", $this->order->getDateCreated()->format("Y-m-d"));
        $this->assertEquals("2013-05-28", $this->order->getDateClosed()->format("Y-m-d"));
        $this->assertEquals(499, $this->order->getTotalAmount());
        $this->assertEquals("BRL", $this->order->getCurrencyId());
        $this->assertEquals(["paid", "not_delivered"], $this->order->getTags());
    }

    /**
     * @test
     */
    public function assertingStatusDetailsInOrderMappingAttributes()
    {
        $this->assertInstanceOf(StatusDetail::class, $this->order->getStatusDetail());
        $this->assertEquals("description status", $this->order->getStatusDetail()->getDescription());
        $this->assertEquals("code", $this->order->getStatusDetail()->getCode());
    }

    /**
     * @test
     */
    public function assertingOrdemItemsInOrderMappingAttributes()
    {
        $items = $this->order->getOrderItems();
        $this->assertInstanceOf(Collection::class, $items);
        /** @var OrderItem $orderItem */
        $orderItem = $items->first();
        $item = $orderItem->getItem();
        $this->assertEquals("MLB12345678", $item->getId());
        $this->assertEquals("Samsung Galaxy", $item->getTitle());
        $this->assertEquals("MLB123", $item->getVariationId());
        $this->assertEquals(["123", "456"], $item->getVariationAttributes());
        $this->assertEquals(1, $orderItem->getQuantity());
        $this->assertEquals(499, $orderItem->getUnitPrice());
        $this->assertEquals("BRL", $orderItem->getCurrencyId());
    }

    /**
     * @test
     */
    public function assertingBuyerInOrderMappingAttributes()
    {
        $this->assertInstanceOf(Buyer::class, $this->order->getBuyer());
        $this->assertEquals("123456789", $this->order->getBuyer()->getId());
        $this->assertEquals("COMPRADORTESTE", $this->order->getBuyer()->getNickname());
        $this->assertEquals("b@b.com", $this->order->getBuyer()->getEmail());
        $this->assertEquals("Comprador de testes", $this->order->getBuyer()->getFirstName());
        $this->assertEquals("da Silva", $this->order->getBuyer()->getLastName());

        $this->assertInstanceOf(PhoneBuyer::class, $this->order->getBuyer()->getPhone());
        $this->assertEquals("11", $this->order->getBuyer()->getPhone()->getAreaCode());
        $this->assertEquals("12345678", $this->order->getBuyer()->getPhone()->getNumber());
        $this->assertEquals("extension", $this->order->getBuyer()->getPhone()->getExtension());

        $this->assertInstanceOf(BillingInfo::class, $this->order->getBuyer()->getBillingInfo());
        $this->assertEquals("CPF", $this->order->getBuyer()->getBillingInfo()->getDocType());
        $this->assertEquals("12345678910", $this->order->getBuyer()->getBillingInfo()->getDocNumber());
    }

    /**
     * @test
     */
    public function assertingSellerInOrderMappingAttributes()
    {
        $this->assertInstanceOf(Seller::class, $this->order->getSeller());
        $this->assertEquals("123456789123", $this->order->getSeller()->getId());
        $this->assertEquals("VENDEDORTESTES", $this->order->getSeller()->getNickname());
        $this->assertEquals("a@a.com", $this->order->getSeller()->getEmail());
        $this->assertEquals("Vendedor de Testes", $this->order->getSeller()->getFirstName());
        $this->assertEquals("testes de documentacao", $this->order->getSeller()->getLastName());

        $this->assertInstanceOf(PhoneSeller::class, $this->order->getSeller()->getPhone());
        $this->assertEquals("48", $this->order->getSeller()->getPhone()->getAreaCode());
        $this->assertEquals("11 12345678", $this->order->getSeller()->getPhone()->getNumber());
        $this->assertEquals("11", $this->order->getSeller()->getPhone()->getExtension());
    }

    /**
     * @test
     */
    public function assertingPaymentsInOrderMappingAttributes()
    {
        $payments = $this->order->getPayments();
        $this->assertInstanceOf(Collection::class, $payments);
        /** @var Payment $payment */
        $payment = $payments->first();
        $this->assertEquals("596707837", $payment->getId());
        $this->assertEquals(499, $payment->getTransactionAmount());
        $this->assertEquals("BRL", $payment->getCurrencyId());
        $this->assertEquals("approved", $payment->getStatus());
        $this->assertEquals("2013-05-27", $payment->getDateCreated()->format("Y-m-d"));
    }

    /**
     * @test
     */
    public function assertingFeedbackInOrderMappingAttributes()
    {
        $this->assertInstanceOf(Feedback::class, $this->order->getFeedback());
        $this->assertEquals("purchase", $this->order->getFeedback()->getPurchase());
        $this->assertEquals("sale", $this->order->getFeedback()->getSale());
    }

    /**
     * @test
     */
    public function assertingShippingInOrderMappingAttributes()
    {
        $this->assertInstanceOf(Shipping::class, $this->order->getShipping());
        $this->assertEquals(20676482441, $this->order->getShipping()->getId());
        $this->assertEquals("shipping", $this->order->getShipping()->getShipmentType());
        $this->assertEquals("handling", $this->order->getShipping()->getStatus());
        $this->assertEquals("BRL", $this->order->getShipping()->getCurrencyId());
        $this->assertEquals(0, $this->order->getShipping()->getCost());
        $this->assertEquals("2013-05-27", $this->order->getShipping()->getDateCreated()->format("Y-m-d"));

        $this->assertInstanceOf(ReceiverAddress::class, $this->order->getShipping()->getReceiverAddress());
        $this->assertEquals(12345678, $this->order->getShipping()->getReceiverAddress()->getId());
        $this->assertEquals("Rua dos testes 123  ", $this->order->getShipping()->getReceiverAddress()->getAddressLine());
        $this->assertEquals("01001000", $this->order->getShipping()->getReceiverAddress()->getZipCode());
        $this->assertEquals(-20.000, $this->order->getShipping()->getReceiverAddress()->getLatitude());
        $this->assertEquals(20.000, $this->order->getShipping()->getReceiverAddress()->getLongitude());

        $this->assertInstanceOf(City::class, $this->order->getShipping()->getReceiverAddress()->getCity());
        $this->assertEquals("BR-SP-44", $this->order->getShipping()->getReceiverAddress()->getCity()->getId());
        $this->assertEquals("São Paulo", $this->order->getShipping()->getReceiverAddress()->getCity()->getName());

        $this->assertInstanceOf(State::class, $this->order->getShipping()->getReceiverAddress()->getState());
        $this->assertEquals("BR-SP", $this->order->getShipping()->getReceiverAddress()->getState()->getId());
        $this->assertEquals("São Paulo", $this->order->getShipping()->getReceiverAddress()->getState()->getName());

        $this->assertInstanceOf(Country::class, $this->order->getShipping()->getReceiverAddress()->getCountry());
        $this->assertEquals("BR", $this->order->getShipping()->getReceiverAddress()->getCountry()->getId());
        $this->assertEquals("Brasil", $this->order->getShipping()->getReceiverAddress()->getCountry()->getName());
    }

    public function getData()
    {
        $json = file_get_contents(__DIR__ . '/order.json');
        $stream = fopen('data://text/json,' . $json, 'r');
        return new Stream($stream);
    }
}