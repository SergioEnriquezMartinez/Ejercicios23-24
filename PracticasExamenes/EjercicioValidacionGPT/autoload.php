<?php
    spl_autoload_register(function($nombreClase) {
        $ruta = "app\classes\\".$nombreClase.".php";
        include_once $ruta;
    });
?>