<?php


namespace app\models;


class Basket extends DbModel
{
    public $id;
    public $session_id;
    public $product_id;

    public function __construct($id = null, $session_id = null, $product_id = null)
    {
        $this->id = $id;
        $this->session_id = $session_id;
        $this->product_id = $product_id;
    }

    public static function getTableName() {
        return 'basket';
    }

}