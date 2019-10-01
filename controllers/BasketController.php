<?php

namespace app\controllers;


use app\models\Basket;

class BasketController extends Controller
{
    public function actionIndex()
    {
        echo $this->render('basket', [
            'basket' => Basket::getBasket(session_id())]);
    }
}