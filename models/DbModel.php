<?php
namespace app\models;

use app\engine\Db;

/**
 * Class Model
 * @package app\models
 */

abstract class DbModel extends Models
{
    public static function getLimit($from, $to) {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} LIMIT ?, ?";
        $stm = Db::getInstance()->prepare($sql); // Так и не понял что нужно поставить перед ->prepare. На все пишет, "call to undefined method"
        $stm->bindValue(1, $from, \PDO::PARAM_INT);
        $stm->bindValue(2, $to, \PDO::PARAM_INT);
        $stm->execute();
    }

    public function getWere($name, $value) {

    }

    public function insert() {
        $params = [];
        $columns = [];
        $tableName = static::getTableName();
        //TODO переделать цикл по state чтобы избавиться от условия
        foreach ($this as $key => $value) {
            if ($key === "id") continue;
            $params[":{$key}"] = $value;
            $columns[] = "`$key`";
        }
        $columns = implode(", ", $columns);
        $values = implode(", ", array_keys($params));

        $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ($values);";

        Db::getInstance()->execute($sql, $params);
        $this->id = Db::getInstance()->lastInsertId();
    }

    public function delete() {
        $tableName = static::getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->execute($sql, ['id' => $this->id]);
    }

    public function update() {

    }

    public function save() {
        if (is_null($this->id)) {
            $this->insert();
        } else {
            $this->update();
        }

    }

    public static function getOne($id) {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->queryObject($sql, ['id' => $id], static::class);
    }


    public static function getAll() {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return Db::getInstance()->queryAll($sql);
    }



}