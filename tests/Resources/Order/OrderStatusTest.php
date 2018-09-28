<?php
/**
 * Class OrderStatusTest
 *
 * @author anthonyrodrigues
 */
namespace Dsc\MercadoLivre\Resources\Order;

use Dsc\MercadoLivre\Resources\Order\OrderStatus;

class OrderStatusTest extends \PHPUnit_Framework_TestCase
{

    public function testIsValidReturnFalseWhenStatusNotExists()
    {
        $this->assertFalse(OrderStatus::isValid('status_not_exists'));
    }

    public function testIsValidReturnTrueWhenStatusExists()
    {
        $this->assertTrue(OrderStatus::isValid(OrderStatus::PAID));
    }
}
