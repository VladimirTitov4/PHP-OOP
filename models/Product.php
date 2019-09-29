<?php

namespace app\models;

class Product extends DbModel
{
    public $id;
    public $name;
    public $description;
    public $price;
    public $seen;

    /**
     * @param null $name
     */

    //TODO Вариант как сделать "умный" update, переделать под __set чтобы небыло дублирования (опционально)
    public function setName($name): void
    {
        $this->name = $name;
        $this->state['name'] = true;
    }

    /**
     * @param null $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @param null $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }

    public $state = [
        'name' => false,
        'description' => false,
        'price' => false,
    ];
    /**
     * Product constructor.
     * @param $id
     * @param $name
     * @param $description
     * @param $price
     */
    public function __construct($name = null, $description = null, $price = null, $seen = null)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->seen = $seen;
    }

    public function getValue($valueOf)
    {
        switch ($valueOf) {
            case 'name':
                return $this->name;
            case 'description':
                return $this->description;
            case 'price':
                return $this->price;
            case 'seen':
                return $this->seen;
        }
    }

    public static function getTableName()
    {
        return 'goods';
    }

}