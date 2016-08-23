<?php
namespace Dsc\MercadoLivre;

/**
 * @author Diego Wagner <diegowagner4@gmail.com>
 */
class CredentialsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var MeliInterface
     */
    private $meli;

    /**
     * @var Environment
     */
    private $environment;

    protected function setUp()
    {
        $this->meli        = $this->createMock(MeliInterface::class);
        $this->environment = $this->getMockForAbstractClass(Environment::class);
    }

    /**
     * @test
     */
    public function constructShouldConfigureTheAttributes()
    {
        $credentials = new Credentials($this->meli, $this->environment);
        $this->assertInstanceOf(MeliInterface::class, $credentials->getCredential());
        $this->assertInstanceOf(Environment::class, $credentials->getEnvironment());
    }
}