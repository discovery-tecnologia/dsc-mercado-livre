<?php
    /**
     * Created by PhpStorm.
     * User: anthonyrodrigues
     * Date: 9/3/18
     * Time: 12:08 PM
     */

    namespace Dsc\MercadoLivre\Publisher;

    use Dsc\MercadoLivre\Announcement\OrderStatus;

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
