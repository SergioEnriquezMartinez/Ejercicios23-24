<?php
session_start();

function validarDatos(){
    $errores = array();
    if (empty($_POST['nombre'])) $errores[] = "Nombre obligatorio";
    else{
        if (!preg_match('/^[A-ZÑÁÉÍÓÚ]+$/', strtoupper($_POST['nombre'])))
            $errores[] = "Formato nombre erróneo";
    }
    if (empty($_POST['edad'])) $errores[] = "Edad obligatoria";
    else{
        if (!filter_var($_POST['edad'], FILTER_VALIDATE_INT)) $errores[] = "La edad tiene que ser un numero positivo";
        else{
            $num = $_POST['edad'];
            if ($num <= 0) $errores[] = "La edad tiene que ser un valor mayor que 0";
        }
    }
    if (empty($_POST['modulos'])) $errores[] = "Debes indicar al menos un módulo";
    
    return $errores;
}

// Validación
$_SESSION["erroresValidacion"] = validarDatos();
if (empty($_SESSION["erroresValidacion"])){
    $_SESSION["userName"] = $_POST['nombre'];
    header("location: todoOK.php");
    exit();
}
$_SESSION["datosFormulario"] = $_POST;
header("location: formulario.php");
