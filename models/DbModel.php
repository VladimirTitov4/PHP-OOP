<?php
namespace app\models;

use app\engine\Db;

/**
 * Class Model
 * @package app\models
 */

abstract class DbModel extends Models
{
    public function insert() {
        $params = [];
        $columns = [];
        $tableName = static::getTableName();
        //TODO переделать цикл по state чтобы избавиться от условия
        foreach ($this as $key => $value) {
            if ($key === "id" OR $key == "state") continue;
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

    public function deleteFromBasket() {

    }

    public function update() {
        $tableName = static::getTableName();
        $setString = '';
        foreach ($this as $key => $value) {
            if ($key !== 'id' && $key !== 'state' && $this->state["$key"]) {
                $keys[] = $key . "=:" . $key;       // format keys:  keyName=:keyName
                $allKeys[] = $key;
            }
        }

        foreach ($allKeys as $someKey ) {
            $changedValue = $someKey;
            $params["$someKey"] = $this->getValue($changedValue);
        }
        $setString = implode(", ", $keys);      // sql string after SET
        $params['id'] = $this->id;
        $sql = "UPDATE {$tableName} SET {$setString} WHERE id = :id";
        Db::getInstance()->execute($sql, $params);
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

    public static function getLimit($qty) {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE 5 LIMIT ?";
        return DB::getInstance()->executeLimit($sql, $qty);
    }

    public function getWhere($field, $value) {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE `$field`=:$field";
        return Db::getInstance()->queryObject($sql, ["$field"=>$value], static::class);
    }

    public static function getCountWhere($field, $value) {
        $tableName = static::getTableName();
        $sql = "SELECT count(*) as count FROM {$tableName} WHERE `$field`=:$field";
        return Db::getInstance()->queryOne($sql, ["$field"=>$value])['count'];
    }
}