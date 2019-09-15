<?php

namespace app\models;

class User extends Model
{
    public $id;
    public $login;
    public $pass;

    public function getTableName() {
        return 'users';
    }
}