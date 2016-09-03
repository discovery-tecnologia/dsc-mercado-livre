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
        $environment = $this->getMockForAbstractClass(Environment::class);

        $meli = new Meli('client-id', 'client-secret', $environment);
        $this->assertAttributeEquals('client-id', 'clientId', $meli);
        $this->assertAttributeEquals('client-secret', 'clientSecret', $meli);
        $this->assertInstanceOf(Environment::class, $meli->getEnvironment());
    }
}