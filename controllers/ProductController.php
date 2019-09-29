<?php

namespace app\controllers;

use app\models\Product;

class ProductController extends Controller
{

    public function actionIndex() {
        echo $this->render('index');
    }

    public function actionCatalog() {
        $page = (int)$_GET['page'] + 5;
        $catalog = Product::getLimit($page);
        echo $this->render('catalog', ['catalog' => $catalog,
                                                'page' => $page]);
    }

    public function actionCard() {
        $id = $_GET['id'];
        $product = Product::getOne($id);
        echo $this->render('card', ['product' => $product]);
    }
}