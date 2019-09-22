<?
session_start();

use app\models\Basket;
use app\models\Product;
use app\models\User;
use app\engine\Db;

include $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";
include $_SERVER['DOCUMENT_ROOT'] . "/../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);

$controllerName = $_GET['c'] ?: 'product';
$actionName = $_GET['a'];

$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName)  . "Controller";

if (class_exists($controllerClass)) {
    $controller = new $controllerClass();
    $controller->runAction($actionName);
} else {
    echo "Не правильный контроллер";
}


/**
 * @var Product $product
 */

