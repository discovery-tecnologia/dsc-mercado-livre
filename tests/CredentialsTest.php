<?php
namespace Dsc\MercadoLivre;

/**
 * @author Diego Wagner <diegowagner4@gmail.com>
 */
class CredentialsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function constructShouldConfigureTheAttributes()
    {
        $credentials = new Credentials('clientid', 'clientsecret', 'accesstoken', true);
        $this->assertAttributeEquals('clientid', 'clientId', $credentials);
        $this->assertAttributeEquals('clientsecret', 'clientSecret', $credentials);
        $this->assertAttributeEquals('accesstoken', 'accessToken', $credentials);
        $this->assertAttributeEquals(true, 'refreshToken', $credentials);
    }
}