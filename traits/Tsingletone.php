<?php

namespace app\traits;

trait Tsingletone
{
    private function __construct()  {}
    private function __clone() {}
    private function __wakeup() {}

    private static $instance = null;

    public static function getInstance() {
        if (is_null(static::$instance)) {
            static::$instance = new static();
        }
        return static::$instance;
    }
}