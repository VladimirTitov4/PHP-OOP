<?php

namespace app\interfaces;

interface IModel
{
    public static function getTableName();
    public static function getOne($id);
    public static function getAll();

}