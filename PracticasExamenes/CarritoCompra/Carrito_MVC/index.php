<?php
session_start();
require_once 'vendor/autoload.php';
use Manu\CarritoMvc\Config\Parameters;
use Manu\CarritoMvc\Controllers\ErrorController;
$nameController = "Manu\CarritoMvc\Controllers\\";
$nameController = $nameController . (($_GET['controller'])??Parameters::$CONTROLLER_DEFAULT). "Controller";
$action = $_GET['action']??Parameters::$ACTION_DEFAULT;
if(class_exists($nameController)){
    $controller = new $nameController();
    if(method_exists($controller, $action)){
        $controller->$action();
    }else (new ErrorController())->mostrar404();
}else (new ErrorController())->mostrar404();
?>
