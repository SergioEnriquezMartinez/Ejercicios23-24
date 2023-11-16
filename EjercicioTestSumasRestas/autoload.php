<?php
spl_autoload_register( function( $nombreClase ) {
    // Para que funcione en Linux/Windows:
    $ruta = "app\\".$nombreClase.'.php';
    $ruta = str_replace("\\", "/", $ruta); // Sustituimos las barras
    include_once $ruta;
} );