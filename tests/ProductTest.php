<?php


namespace app\tests;

use app\models\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testProduct() {
        $name = "Чай";
        $description = "Цейлонский";
        $price = 55;

        $product = new Product($name, $description, $price);
        $this->assertEquals($name, $product->name);
        $this->assertEquals($description, $product->description);
        $this->assertIsInt($price, $product->price);
    }
}

