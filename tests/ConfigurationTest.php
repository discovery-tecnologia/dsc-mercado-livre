<?php
/**
 * Class ConfigurationTest
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre;

use Doctrine\Common\Cache\Cache;
use Dsc\MercadoLivre\Parser\SerializerInterface;
use Dsc\MercadoLivre\Storage\StorageInterface;

class ConfigurationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * @var StorageInterface
     */
    private $storage;

    protected function setUp()
    {
        $this->serializer = $this->createMock(SerializerInterface::class);
        $this->storage    = $this->createMock(StorageInterface::class);
    }

    /**
     * @test
     */
    public function constructShouldConfigureTheAttributes()
    {
        $configuration = new Configuration($this->serializer, $this->storage);
        $this->assertInstanceOf(SerializerInterface::class, $configuration->getSerializer());
        $this->assertInstanceOf(StorageInterface::class, $configuration->getStorage());
    }

    /**
     * @test
     */
    public function constructShouldConfigureTheAttributesCaseNotInformated()
    {
        $configuration = new Configuration();
        $this->assertInstanceOf(SerializerInterface::class, $configuration->getSerializer());
        $this->assertInstanceOf(StorageInterface::class, $configuration->getStorage());
    }
}