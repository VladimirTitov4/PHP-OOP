<?php
namespace app\controllers;


use app\engine\Request;
use app\models\Basket;

class ApiController extends Controller
{
    public function actionAddBasket() {

        (new Basket(session_id(), (new Request())->getParams()['id'], 1))->save();

        $response = [
            'result' => 1,
            'count' => Basket::getCountWhere('session_id', session_id())
        ];
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }

    public function actionDeleteBasket() {
        Basket::deleteBasket((Request::getInstance()->getParams()['id']), session_id());

        $response = [
            'result' => 1,
            'count' => Basket::getCountWhere('session_id', session_id())
        ];
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }
}