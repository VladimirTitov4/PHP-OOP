<?php


namespace app\models;


class Basket extends Model
{
    public $id;
    public $id_session;
    public $id_good;
    public $qty;

    public function getTableName()
    {
        return 'basket';
    }

}