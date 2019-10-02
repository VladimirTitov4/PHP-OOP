<?php


namespace app\models;


use app\engine\Db;

class Basket extends DbModel
{
    public $id;
    public $session_id;
    public $id_good;
    public $qty;

    /**
     * Basket constructor.
     * @param $session_id
     * @param $id_good
     * @param $qty
     */
    public function __construct($session_id = null, $id_good = null, $qty = null)
    {
        $this->session_id = $session_id;
        $this->id_good = $id_good;
        $this->qty = $qty;
    }

    public static function getTableName()
    {
        return 'basket';
    }

    public static function getBasket($session)
    {
        $sql = "SELECT basket.id as basket_id, goods.id as goods_id, goods.name as name, goods.price as price, qty 
    FROM `basket`, `goods` WHERE basket.id_good = goods.id  AND session_id = :session";
        return Db::getInstance()->queryAll($sql, ['session' => $session]);
    }

    public static function deleteBasket($id, $session)
    {
        $sql = "DELETE FROM basket WHERE id = :id AND session_id = :session";
        
        return Db::getInstance()->execute($sql, ['id' => $id, 'session' => $session]);
    }
}