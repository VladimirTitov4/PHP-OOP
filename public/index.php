<?
session_start();

use app\models\Basket;
use app\models\Product;
use app\models\User;
use app\engine\Db;
use app\engine\Request;

include $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";
include $_SERVER['DOCUMENT_ROOT'] . "/../engine/Autoload.php";
include $_SERVER['DOCUMENT_ROOT'] . "/../vendor/autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);

$request = new Request();

$controllerName = $request->getControllerName() ?: 'product';
$actionName = $request->getActionName();

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

//$product = new Product();
//$product = Product::getOne(10);
//
//$product->setName("new new new Product");
//$product->setDescription("very very good");
//$product->setPrice(1000);
//$product->save();

