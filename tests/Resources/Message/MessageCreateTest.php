<?php

namespace Dsc\MercadoLivre\Resources\Message;

use Doctrine\Common\Collections\Collection;
use Dsc\MercadoLivre\Client;
use Dsc\MercadoLivre\Environment;
use Dsc\MercadoLivre\MeliInterface;
use GuzzleHttp\Psr7\Stream;

class MessageCreateTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var MessageResponse
     */
    protected $messageResponse;

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

        /** @var MessageService $service */
        $service = $this->getMockForAbstractClass(MessageService::class, [$meli, $client]);
        $this->messageResponse = $service->send($this->messageBuild(), 2467189254, 567868047);
    }

    /**
     * @test
     */
    public function assertingMappingMappingAttributes()
    {
        $this->assertInstanceOf(MessageResponse::class, $this->messageResponse);
        $this->assertEquals("a054f8ebe4644f8dab8ba5e8f53ed07a", $this->messageResponse->getId());
        $this->assertEquals("MLB", $this->messageResponse->getSiteId());
        $this->assertEquals("6632837458654806", $this->messageResponse->getClientId());
        $this->assertEquals("available", $this->messageResponse->getStatus());
        $this->assertEmpty($this->messageResponse->getSubject());
        $this->assertEquals("Test message ToUserId 2", $this->messageResponse->getText());
        $this->assertEmpty($this->messageResponse->getAttachments());
        $this->assertFalse($this->messageResponse->getConversationFirstMessage());
    }

    /**
     * @test
     */
    public function assertingFromAndToInMessageResponseMappingAttributes()
    {
        $this->assertInstanceOf(From::class, $this->messageResponse->getFrom());
        $this->assertEquals("567868047", $this->messageResponse->getFrom()->getUserId());
        $this->assertEquals("test_user_9225082@testuser.com", $this->messageResponse->getFrom()->getEmail());
        $this->assertEquals("Test Test", $this->messageResponse->getFrom()->getName());

        $this->assertInstanceOf(To::class, $this->messageResponse->getTo());
        $this->assertEquals("567917311", $this->messageResponse->getTo()->getUserId());
        $this->assertEquals("test_user_69534885@testuser.com", $this->messageResponse->getTo()->getEmail());
        $this->assertEquals("Test Test", $this->messageResponse->getTo()->getName());
    }

    /**
     * @test
     */
    public function assertingMessageDateInMessageResponseMappingAttributes()
    {
        $this->assertInstanceOf(MessageDate::class, $this->messageResponse->getMessageDate());

        /** @var MessageDate */
        $messageDate = $this->messageResponse->getMessageDate();
        $this->assertEquals("2020-05-28 10:10:37.054000", $messageDate->getReceived()->format('Y-m-d H:i:s.u'));
        $this->assertEquals("2020-05-28 10:10:37.142000", $messageDate->getAvailable()->format('Y-m-d H:i:s.u'));
        $this->assertEquals("2020-05-28 10:10:37.054000", $messageDate->getCreated()->format('Y-m-d H:i:s.u'));
        $this->assertEmpty($messageDate->getNotified());
        $this->assertEmpty($messageDate->getRead());
    }

    /**
     * @test
     */
    public function assertingModerationInMessageResponseMappingAttributes()
    {
        $this->assertInstanceOf(Moderation::class, $this->messageResponse->getModeration());

        /** @var Moderation */
        $moderation = $this->messageResponse->getModeration();
        $this->assertEquals("clean", $moderation->getStatus());
        $this->assertEmpty($moderation->getReason());
        $this->assertEquals("online", $moderation->getSource());
        $this->assertEquals("2020-05-28 10:10:37.142000", $moderation->getModerationDate()->format('Y-m-d H:i:s.u'));
    }

    /**
     * @test
     */
    public function assertingResourcesInMessageResponseMappingAttributes()
    {
        /** @var Collection */
        $resources = $this->messageResponse->getResources();
        $this->assertInstanceOf(Collection::class, $resources);

        /** @var Resource $resource */
        $resource = $resources->first();
        $this->assertInstanceOf(Resource::class, $resource);
        $this->assertEquals(2467189254, $resource->getId());
        $this->assertEquals("packs", $resource->getName());
    }

    /**
     * @return Stream
     */
    public function getData()
    {
        $json = file_get_contents(__DIR__ . '/message-response.json');
        $stream = fopen('data://text/json,' . $json, 'r');
        return new Stream($stream);
    }

    /**
     * @return Message
     */
    public function messageBuild()
    {
        /** @var From $from */
        $from = new From();
        $from->setUserId(567868047);

        /** @var To $to */
        $to = new To();
        $to->setUserId(567917311);

        /** @var Message $message */
        $message = new Message();
        $message->setFrom($from);
        $message->setTo($to);
        $message->setText("Test message");

        return $message;
    }
}
