<?php
namespace Dsc\MercadoLivre;
use Dsc\MercadoLivre\Environments\Site;

/**
 * @author Diego Wagner <diegowagner4@gmail.com>
 */
class CredentialsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var MeliInterface
     */
    private $meli;

    protected function setUp()
    {
        $this->meli = $this->createMock(MeliInterface::class);
    }

    /**
     * @test
     */
    public function constructShouldConfigureTheAttributes()
    {
        $credentials = new Credentials($this->meli, Site::BRASIL, 'access-token', 'refresh-token');

        $this->assertInstanceOf(MeliInterface::class, $credentials->getMeli());
        $this->assertAttributeEquals(Site::BRASIL, 'siteId', $credentials);
        $this->assertAttributeEquals('access-token',  'accessToken', $credentials);
        $this->assertAttributeEquals('refresh-token', 'refreshToken', $credentials);
    }
}