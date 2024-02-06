<?php
session_start();
require_once 'vendor/autoload.php';

use Mgj\ProyectoBlog2024\Config\Parameters;
use Mgj\ProyectoBlog2024\Controllers\ViewController;
use Mgj\ProyectoBlog2024\Controllers\ErrorController;
use Mgj\ProyectoBlog2024\Helpers\Validations;

/*
    http://wwww.blogjavi.es/index.php?controller=Entrada&action=getAll
    
    URL Amigable:
    http://www.blogjavi.es/Entrada/getAll
*/

// CONTROLADOR FRONTAL:
    $nameController = "Mgj\ProyectoBlog2024\Controllers\\";
    $nameController = $nameController . (($_GET['controller'])??Parameters::$CONTROLLER_DEFAULT) . "Controller";
    $action = $_GET['action']??Parameters::$ACTION_DEFAULT;
    
    // Método class_exists
    if (class_exists($nameController)){
        $controller = new $nameController();
        if (method_exists($controller, $action)){
            $controller->$action();
        }else (new ViewController())->showError(404);   
    }else (new ViewController())->showError(404);
    

    