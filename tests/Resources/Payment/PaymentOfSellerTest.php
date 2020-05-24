<?php

namespace Dsc\MercadoLivre\Resources\Order;

use Dsc\MercadoLivre\Client;
use Dsc\MercadoLivre\Environment;
use Dsc\MercadoLivre\MeliInterface;
use Dsc\MercadoLivre\Resources\Payment\CardHolder;
use Dsc\MercadoLivre\Resources\Payment\Payer;
use Dsc\MercadoLivre\Resources\Payment\PayerIdentification;
use Dsc\MercadoLivre\Resources\Payment\PayerPhone;
use Dsc\MercadoLivre\Resources\Payment\Payment;
use Dsc\MercadoLivre\Resources\Payment\PaymentService;
use GuzzleHttp\Psr7\Stream;

class PaymentOfSellerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Payment
     */
    protected $payment;

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

        /** @var PaymentService $service */
        $service = $this->getMockForAbstractClass(PaymentService::class, [$meli, $client]);
        $this->payment = $service->findPayment('123');
    }

    /**
     * @test
     */
    public function assertingPaymentMappingAttributes()
    {
        $this->assertInstanceOf(Payment::class, $this->payment);
        $this->assertEquals(6766374002, $this->payment->getId());
        $this->assertEquals("2020-05-22", $this->payment->getDateCreated()->format("Y-m-d"));
        $this->assertEquals("2020-05-22", $this->payment->getDateApproved()->format("Y-m-d"));
        $this->assertEquals("2020-05-22", $this->payment->getLastModified()->format("Y-m-d"));
        $this->assertEquals("Item Teste Nao Ofertar", $this->payment->getReason());
        $this->assertEquals("BRL", $this->payment->getCurrencyId());
        $this->assertEquals(2550, $this->payment->getTransactionAmount());
        $this->assertEquals(2550, $this->payment->getTotalPaidAmount());
        $this->assertEquals("approved", $this->payment->getStatus());
        $this->assertEquals("accredited", $this->payment->getStatusDetail());
        $this->assertEquals(2550, $this->payment->getInstallmentAmount());
        $this->assertEquals("credit_card", $this->payment->getPaymentType());
        $this->assertEquals("elo", $this->payment->getPaymentMethodId());
        $this->assertEquals("MELI", $this->payment->getMarketplace());
        $this->assertEquals("regular_payment", $this->payment->getOperationType());
        $this->assertEquals("2460122623", $this->payment->getExternalReference());
        $this->assertEquals("2460122623", $this->payment->getOrderId());
        $this->assertEquals("MERCADOLIVRE", $this->payment->getStatementDescriptor());
        $this->assertEquals(1, $this->payment->getInstallments());
        $this->assertEquals(1234567, $this->payment->getAuthorizationCode());
        $this->assertEquals(687, $this->payment->getIssuerId());
        $this->assertEquals(2269.5, $this->payment->getNetReceivedAmount());
        $this->assertEquals(64.98, $this->payment->getMercadopagoFee());
        $this->assertEquals(215.52, $this->payment->getMarketplaceFee());
        $this->assertEquals(0, $this->payment->getDiscountFee());
        $this->assertEquals(0, $this->payment->getCouponFee());
        $this->assertEquals(0, $this->payment->getFinanceFee());
        $this->assertEquals("no", $this->payment->getReleased());
    }

    /**
     * @test
     */
    public function assertingCardHolderInPaymentMappingAttributes()
    {
        $this->assertInstanceOf(CardHolder::class, $this->payment->getCardHolder());
        $this->assertEquals("APRO PEDRO DE LARA", $this->payment->getCardHolder()->getName());
        $this->assertEquals("32247633021", $this->payment->getCardHolder()->getIdentification()->getNumber());
        $this->assertEquals("CPF", $this->payment->getCardHolder()->getIdentification()->getType());
    }

    /**
     * @test
     */
    public function assertingPayerInPaymentMappingAttributes()
    {
        $this->assertInstanceOf(Payer::class, $this->payment->getPayer());

        /** @var Payer */
        $payer = $this->payment->getPayer();
        $this->assertEquals(567917311, $payer->getId());
        $this->assertEquals("ttest.l5k55r2-ogi2dknjyg4ytkojv@mail.mercadolivre.com", $payer->getEmail());
        $this->assertInstanceOf(PayerPhone::class, $payer->getPhone());
        $this->assertEquals("01", $payer->getPhone()->getAreaCode());
        $this->assertEquals("1111-1111", $payer->getPhone()->getNumber());
        $this->assertEmpty($payer->getPhone()->getExtension());
        $this->assertInstanceOf(PayerIdentification::class, $payer->getIdentification());
        $this->assertEmpty($payer->getIdentification()->getNumber());
        $this->assertEmpty($payer->getIdentification()->getType());
    }

    /**
     * @return Stream
     */
    public function getData()
    {
        $json = file_get_contents(__DIR__ . '/payment-seller.json');
        $stream = fopen('data://text/json,' . $json, 'r');
        return new Stream($stream);
    }
}
