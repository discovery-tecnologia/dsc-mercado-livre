<?php
namespace Dsc\MercadoLivre;

use Dsc\MercadoLivre\Storage\SessionManager;
use Dsc\MercadoLivre\Storage\StorageInterface;

class AccessTokenTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var AccessToken
     */
    private $accessToken;

    protected function setUp()
    {
        $this->accessToken = new AccessToken();
    }

    /**
     * @test
     */
    public function constructShouldInstatiateSessionManager()
    {
        $this->assertAttributeEquals(new SessionManager(), 'storage', $this->accessToken);
    }

    /**
     * @test
     */
    public function methodSetAndGetTokenShouldReturnCorrectValue()
    {
        $this->accessToken->setToken('foo');
        $this->assertEquals('foo', $this->accessToken->getToken());
    }

    /**
     * @test
     */
    public function methodSetAndGetRefreshTokenShouldReturnCorrectValue()
    {
        $this->accessToken->setToken('bar');
        $this->assertEquals('bar', $this->accessToken->getToken());
    }

    /**
     * @test
     */
    public function methodSetAndGetExpireInShouldReturnCorrectValue()
    {
        $this->accessToken->setToken(123543);
        $this->assertEquals(123543, $this->accessToken->getToken());
    }

    /**
     * @test
     */
    public function isExpiredShouldReturnTrueWhenNotExistsValue()
    {
        $storage = $this->createMock(StorageInterface::class);
        $storage->expects($this->at(0))
                ->method('has')
                ->with($this->equalTo(AccessToken::EXPIRE_IN))
                ->willReturn(null);

        $accessToken = new AccessToken($storage);
        $this->assertTrue($accessToken->isExpired());
    }

    /**
     * @test
     */
    public function isExpiredShouldReturnFalseWhenValueIsGreaterThanActualTime()
    {
        $this->accessToken->setExpireIn(time() + 1000);
        $this->assertFalse($this->accessToken->isExpired());
    }

    /**
     * @test
     */
    public function isExpiredShouldReturnTrueWhenValueIsLessThanActualTime()
    {
        $this->accessToken->setExpireIn(-100000);
        $this->assertTrue($this->accessToken->isExpired());
    }

    /**
     * @test
     */
    public function isValidShouldReturnFalseWhenTokenIsNull()
    {
        $this->accessToken->setToken(null);
        $this->assertFalse($this->accessToken->isValid());
    }

    /**
     * @test
     */
    public function isValidShouldReturnFalseWhenIsExpired()
    {
        $this->accessToken->setExpireIn(-100000);
        $this->assertFalse($this->accessToken->isValid());
    }

    /**
     * @test
     */
    public function isValidShouldReturnTrueWhenTokenIsNotNullAndNotExpired()
    {
        $this->accessToken->setToken('foo');
        $this->accessToken->setExpireIn(time() + 1000);
        $this->assertTrue($this->accessToken->isValid());
    }

    /**
     * @test
     */
    public function returnAccessTokenCorrectWithOnlyClientID()
    {
        $meli = $this->createMock(MeliInterface::class);
        $meli->expects($this->any())
             ->method('getClientId')
             ->willReturn('123456789');

        $clientId = $meli->getClientId();
        $userId = $meli->getUserId();
        $key = $clientId.$userId;

        $accessToken = new AccessToken(null, $key);
        $accessToken->setToken('bar-foo');
        $this->assertEquals('bar-foo', $accessToken->getToken());
    }

    /**
     * @test
     */
    public function returnAccessTokenCorrectWhenUserIdIsInformed()
    {
        $meli = $this->createMock(MeliInterface::class);
        $meli->expects($this->any())
             ->method('getClientId')
             ->willReturn('123456789');

        $meli->expects($this->any())
             ->method('getUserId')
             ->willReturn('987');

        $clientId = $meli->getClientId();
        $userId = $meli->getUserId();
        $key = $clientId.$userId;

        $accessToken = new AccessToken(null, $key);
        $accessToken->setToken('bar-foo-user');
        $this->assertEquals('bar-foo-user', $accessToken->getToken());
    }
}