<?php
    require_once 'vendor/autoload.php';

    session_start();


    use Sergi\ProyectoBlog\Config\Parametros;
    use Sergi\ProyectoBlog\Controladores\VistaController;
    
    //$_SESSION["user"] = "sergi";

    // CONTROLADOR FRONTAL
    $nameController = 'Sergi\ProyectoBlog\Controladores\\';
    $nameController = $nameController . (($_GET['controller']) ?? Parametros::$CONTROLADOR_DEFECTO) . 'Controller';
    $action = ($_GET['action']) ?? Parametros::$ACCION_DEFECTO;

    // Metodo class_exists() comprueba si la clase indicada ha sido definida.
    if (class_exists($nameController)) {
        $controller = new $nameController();
        if (method_exists($controller, $action)) {
            $controller->$action();
        } else (new VistaController())->mostrarError(404);
    } else (new VistaController())->mostrarError(404);
?>