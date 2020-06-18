<?php

namespace Dsc\MercadoLivre\Resources\Message;

use Dsc\MercadoLivre\Client;
use Dsc\MercadoLivre\Environment;
use Dsc\MercadoLivre\MeliInterface;
use Dsc\MercadoLivre\Resources\Feedback\FeedbackPost;
use Dsc\MercadoLivre\Resources\Feedback\FeedbackResponse;
use Dsc\MercadoLivre\Resources\Feedback\Rating;
use Dsc\MercadoLivre\Resources\Order\OrderService;
use GuzzleHttp\Psr7\Stream;

class PublishFeedbackTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var FeedbackResponse
     */
    protected $feedbackResponse;

    protected function setUp()
    {
        $data = $this->getData();
        $meli = $this->createMock(MeliInterface::class);
        $meli->expects($this->any())
            ->method('getEnvironment')
            ->willReturn($this->getMockForAbstractClass(Environment::class));

        $client = $this->createMock(Client::class);
        $client->expects($this->any())
            ->method('post')
            ->willReturn($data);

        /** @var OrderService $service */
        $service = $this->getMockForAbstractClass(OrderService::class, [$meli, $client]);
        $this->feedbackResponse = $service->publishFeedback($this->feedbackBuild(), 2510012417);
    }

    /**
     * @test
     */
    public function assertingMappingAttributes()
    {
        $this->assertInstanceOf(FeedbackResponse::class, $this->feedbackResponse);

        $this->assertEquals(9041141640694, $this->feedbackResponse->getId());
        $this->assertEquals(564889564, $this->feedbackResponse->getCustFrom());
        $this->assertEquals(567917311, $this->feedbackResponse->getCustTo());
        $this->assertEquals(2510012417, $this->feedbackResponse->getOrderId());
        $this->assertEquals("MLB", $this->feedbackResponse->getSiteId());
        $this->assertTrue($this->feedbackResponse->getFulfilled());
        $this->assertEquals("Seu pedido foi entregue. Feito !", $this->feedbackResponse->getMessage());
        $this->assertEquals("POSITIVE", $this->feedbackResponse->getRating());
        $this->assertEquals(
            "2020-06-16 01:46:39.235000",
            $this->feedbackResponse->getDateCreated()->format('Y-m-d H:i:s.u')
        );
        $this->assertEquals("seller", $this->feedbackResponse->getCustRole());
        $this->assertEquals("hidden", $this->feedbackResponse->getStatus());
        $this->assertEmpty($this->feedbackResponse->getReason());
        $this->assertEmpty($this->feedbackResponse->getReplyStatus());
        $this->assertEmpty($this->feedbackResponse->getVisibilityDate());
        $this->assertEmpty($this->feedbackResponse->getReply());
        $this->assertEmpty($this->feedbackResponse->getReplyDate());
    }

    /**
     * @return Stream
     */
    public function getData()
    {
        $json = file_get_contents(__DIR__ . '/feedback-response.json');
        $stream = fopen('data://text/json,' . $json, 'r');
        return new Stream($stream);
    }

    /**
     * @return FeedbackPost
     */
    public function feedbackBuild()
    {
        $feedback = new FeedbackPost();
        $feedback
            ->setFulfilled(true)
            ->setMessage('Test')
            ->setRating(Rating::POSITIVE);

        return $feedback;
    }
}
