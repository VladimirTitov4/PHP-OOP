<?php


namespace app\tests;

use app\models\Basket;
use PHPUnit\Framework\TestCase;


class BasketTest extends TestCase
{
    public function testBasket() {
        $session_id = 'dasdasq4r3432r23d';
        $product_id = 5;

        $basket = new Basket($session_id, $product_id);
        $this->assertIsInt($product_id, $basket->product_id);
        $this->assertIsString($session_id, $basket->session_id);
    }
}