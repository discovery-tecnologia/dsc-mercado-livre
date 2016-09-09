<?php
namespace Dsc\MercadoLivre;

use GuzzleHttp\Psr7\Response;

/**
 * @author Diego Wagner <diegowagner4@gmail.com>
 */
class MeliExceptionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function createShouldCreateAGenericMessageWhenStatusCodeIsNot400()
    {
        $response = new Response(500, [], 'Server gone mad');
        $exception = MeliException::create($response);
        $this->assertInstanceOf(MeliException::class, $exception);
        $this->assertEquals('[500] A HTTP error has occurred: Server gone mad', $exception->getMessage());
    }
}