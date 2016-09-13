<?php
/**
 * Class ConfigurationTest
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre;

use Doctrine\Common\Cache\Cache;

class ConfigurationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Cache
     */
    private $cache;

    protected function setUp()
    {
        $this->cache = $this->createMock(Cache::class);
    }

    /**
     * @test
     */
    public function constructShouldConfigureTheAttributes()
    {
        $configuration = new Configuration($this->cache);
        $this->assertInstanceOf(Cache::class, $configuration->getCache());
    }

    /**
     * @test
     */
    public function constructShouldConfigureTheAttributesCaseNotInformated()
    {
        $configuration = new Configuration();
        $this->assertInstanceOf(Cache::class, $configuration->getCache());
    }
}