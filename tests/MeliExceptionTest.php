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
        $response = new Response(500, [], '{"error":"error"}');
        $exception = MeliException::create($response);
        $this->assertInstanceOf(MeliException::class, $exception);
        $this->assertEquals('[500] A HTTP error has occurred: {"error":"error"}', $exception->getMessage());
    }

    /**
     * @test
     */
    public function createShouldCreateAMessageWhenStatusCodeIs404NotFound()
    {
        $response = new Response(404, [], '{"message":"Registry not found","status":404}');
        $exception = MeliException::create($response);
        $this->assertInstanceOf(MeliException::class, $exception);
        $this->assertEquals('[404] Not found: {"message":"Registry not found","status":404}', $exception->getMessage());
    }
}