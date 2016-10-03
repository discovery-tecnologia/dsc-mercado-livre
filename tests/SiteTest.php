<?php
namespace Dsc\MercadoLivre;
use Dsc\MercadoLivre\Environments\Site;

/**
 * @author Diego Wagner <diegowagner4@gmail.com>
 */
class SiteTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function isValidShouldReturnTrueWhenSiteExists()
    {
        $this->assertTrue(Site::isValid("MLB"));
    }

    /**
     * @test
     */
    public function isValidShouldReturnFalseWhenSiteNotExists()
    {
        $this->assertFalse(Site::isValid("MLB123"));
    }
}