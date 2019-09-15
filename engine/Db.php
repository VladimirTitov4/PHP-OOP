<?php

namespace app\engine;

class Db
{
    public function queryOne($sql, $params= []) {
        return $sql . "<br>";
    }

    public function queryAll($sql, $params= []) {
        return $sql . "<br>";
    }

}