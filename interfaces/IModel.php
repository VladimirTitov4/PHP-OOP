<?php

namespace app\interfaces;

interface IModel
{
    public function getTableName();
    public function getOne($id);
    public function getAll();
}