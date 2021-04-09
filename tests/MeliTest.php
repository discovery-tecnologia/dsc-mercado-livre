<?php
namespace Dsc\MercadoLivre;

/**
 * @author Diego Wagner <diegowagner4@gmail.com>
 */
class MeliTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function constructShouldConfigureTheAttributes()
    {
        /**
         * @var Environment
         */
        $environment = $this->getMockForAbstractClass(Environment::class);

        $meli = new Meli('client-id', 'client-secret', $environment);
        $this->assertAttributeEquals('client-id', 'clientId', $meli);
        $this->assertAttributeEquals('client-secret', 'clientSecret', $meli);
        $this->assertInstanceOf(Environment::class, $meli->getEnvironment());
    }

    /**
     * @test
     */
    public function methodSetAndGetUserIdShouldReturnCorrectValue()
    {
        $meli = new Meli('client-id', 'client-secret');
        $meli->setUserId('123');
        $this->assertEquals('123', $meli->getUserId());
    }

    /**
     * @test
     */
    public function methodGetTenantIdShouldReturnCorrectValueWithUser()
    {
        $meli = new Meli('123', 'client-secret');
        $meli->setUserId('456');
        $this->assertEquals('123456', $meli->getTenantId());
    }

    /**
     * @test
     */
    public function methodGetTenantIdShouldReturnCorrectValueWithoutUser()
    {
        $meli = new Meli('123', 'client-secret');
        $this->assertEquals('123', $meli->getTenantId());
    }
}