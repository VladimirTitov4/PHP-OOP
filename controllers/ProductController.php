<?php

namespace app\controllers;

use app\models\Product;
use app\models\Basket;

class ProductController extends Controller
{
    public function actionIndex() {
        echo $this->render('index');
    }

    public function actionCatalog() {
        $catalog = Product::getAll();
        echo $this->render('catalog', ['catalog' => $catalog]);
    }

    public function actionBasket() {
        $basket = Basket::getAll();
        echo $this->render('basket', ['basket' => $basket]);
    }

    public function actionCard() {
        $id = $_GET['id'];
        $product = Product::getOne($id);
        echo $this->render('card', ['product' => $product]);
    }
}