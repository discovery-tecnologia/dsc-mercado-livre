<?php
/**
 * Class ConfigurationTest
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre;

use Doctrine\Common\Cache\Cache;
use Dsc\MercadoLivre\Codec\Formatter;
use Dsc\MercadoLivre\Codec\SerializerInterface;

class ConfigurationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * @var Cache
     */
    private $cache;

    /**
     * @var string
     */
    private $formatter;

    protected function setUp()
    {
        $this->serializer = $this->createMock(SerializerInterface::class);
        $this->cache = $this->createMock(Cache::class);
        $this->formatter = Formatter::JSON;
    }

    /**
     * @test
     */
    public function constructShouldConfigureTheAttributes()
    {
        $configuration = new Configuration($this->serializer, $this->cache);
        $this->assertInstanceOf(SerializerInterface::class, $configuration->getSerializer());
        $this->assertInstanceOf(Cache::class, $configuration->getCache());
        $this->assertEquals(Formatter::JSON, $configuration->getFormatter());
    }

    /**
     * @test
     */
    public function constructShouldConfigureTheAttributesCaseNotInformated()
    {
        $configuration = new Configuration();
        $this->assertInstanceOf(SerializerInterface::class, $configuration->getSerializer());
        $this->assertInstanceOf(Cache::class, $configuration->getCache());
        $this->assertEquals(Formatter::JSON, $configuration->getFormatter());
    }
}