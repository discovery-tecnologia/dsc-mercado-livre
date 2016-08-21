<?php
namespace Dsc\MercadoLivre;

use Dsc\MercadoLivre\Environments\Production;

/**
 * @author Diego Wagner <diegowagner4@gmail.com>
 */
class EnvironmentTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Environment
     */
    private $environment;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->environment = $this->getMockForAbstractClass(Environment::class);

        $this->environment->expects($this->any())
             ->method('getHost')
             ->willReturn('test.com');

        $this->environment->expects($this->any())
             ->method('getWsHost')
             ->willReturn('ws.test.com');
    }

    /**
     * @test
     */
    public function isValidShouldReturnTrueWhenHostIsProduction()
    {
        $this->assertTrue(Environment::isValid(Production::WS_HOST));
    }
}