<?php

namespace app\controllers;

use app\models\Basket;

class BasketController extends Controller
{
    public function actionList() {
        $basket = Basket::getAll();
        echo $this->render('basket', ['basket' => $basket]);
    }
}