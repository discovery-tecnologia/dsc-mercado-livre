<?php
namespace Dsc\MercadoLivre\Publisher;

use Dsc\MercadoLivre\Announcement\Status;

class StatusTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function isValidShouldReturnTrueWhenRegionExistsInEnvironments()
    {
        $this->assertFalse(Status::isValid("status_not_exists"));
    }

    /**
     * @test
     */
    public function isValidShouldReturnFalseWhenRegionNotExistsInEnvironments()
    {
        $this->assertTrue(Status::isValid(Status::ACTIVE));
    }
}