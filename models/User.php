<?php

namespace app\models;

class User extends DbModel
{
    public $id;
    public $login;
    public $pass;

    public static function getTableName() {
        return 'users';
    }
}