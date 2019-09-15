<?php

use app\models\Basket;
use app\models\Order;
use app\models\Product;
use app\models\user;
use app\engine\Db;


include "../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);


$product = new Product(new Db());
echo $product->getOne(3);

$user = new User(new Db());
echo $user->getAll();

$basket = new Basket(new Db());
echo $basket->getAll();

$order = new Order(new Db());
echo $order->getOne(1);

var_dump($order);
