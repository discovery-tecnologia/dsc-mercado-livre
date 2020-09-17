<?php
namespace Dsc\MercadoLivre\Storage;

use Dsc\MercadoLivre\Storage\SessionManager;
use Dsc\MercadoLivre\Storage\StorageInterface;

class CacheFilesystemTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var CacheFilesystem
     */
    private $storage;

    const CACHE_KEY = 'test.cache';

    protected function setUp()
    {
        $this->storage = new CacheFilesystem('/tmp/cache');
    }

    /**
     * @test
     */
    public function isValidFileCacheImplementation()
    {
        $this->storage->set(self::CACHE_KEY, 1000);
        $has = $this->storage->has(self::CACHE_KEY, 1000);
        $this->assertTrue($has);

        $get = $this->storage->get(self::CACHE_KEY);
        $this->assertEquals(1000, $get);
        // remove cache
        $this->storage->remove(self::CACHE_KEY);
        
        $has = $this->storage->has(self::CACHE_KEY, 1000);
        $this->assertFalse($has);

        $get = $this->storage->get(self::CACHE_KEY);
        $this->assertEquals(null, $get);
    }
}