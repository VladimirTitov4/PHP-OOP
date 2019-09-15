<?php


namespace app\models;


class Order extends Model
{
    public $id;
    public $id_session;
    public $name;
    public $phone;
    public $status;

    public function getTableName()
    {
        return 'order';
    }

}