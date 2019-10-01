<?php
namespace app\models;
class User extends DbModel
{
    public $id;
    public $login;
    public $pass;
    public $hash;
    public $state = [
        'hash' => true,
    ];
    /**
     * User constructor.
     * @param $login
     * @param $pass
     * @param $hash
     * @param $id
     */
    public function __construct($login = null, $pass = null, $hash = null, $id = null)
    {
        $this->login = $login;
        $this->pass = $pass;
        $this->hash = $hash;
        $this->id = $id;
    }
    public static function getTableName() {
        return 'users';
    }
    public static function auth($login, $pass) {
        $user = static::getWhere('login', $login);
        if (password_verify($pass, $user->pass)) {
            $_SESSION['login'] = $login;
            $_SESSION['id'] = $user->id;
            return true;
        }
        return false;
    }
    public static function isAuth() {
        if (isset($_COOKIE["hash"])) {
            $hash = $_COOKIE["hash"];
            $user = static::getWhere('hash', $hash);
            $id = $user->id;
            $login = $user->login;
            if (!empty($login)) {
                $_SESSION['login'] = $login;
                $_SESSION['id'] = $id;
            }
        }
        return isset($_SESSION['login']) ? true: false;
    }
    public static function getName() {
        return static::isAuth() ? $_SESSION['login'] : "Guest";
    }
    public static function getId() {
        return $_SESSION['id'];
    }
}