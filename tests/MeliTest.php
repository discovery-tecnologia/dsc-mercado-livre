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
        $credentials = new Meli('clientid', 'clientsecret', 'accesstoken', 'refreshtoken');
        $this->assertAttributeEquals('clientid', 'clientId', $credentials);
        $this->assertAttributeEquals('clientsecret', 'clientSecret', $credentials);
        $this->assertAttributeEquals('accesstoken', 'accessToken', $credentials);
        $this->assertAttributeEquals('refreshtoken', 'refreshToken', $credentials);
    }
}