<?php

    use app\Validator;
    include_once 'app/Validator.php';
    session_start();
    

    $nombre = $_POST['nombre'];
    $priApe = $_POST['priApe'];
    $edad = $_POST['edad'];
    $estado = $_POST['estado'];
    $diagnostico = $_POST['diagnostico'];

    if (Validator::validaFormulario($nombre, $priApe, $edad, $estado, $diagnostico)) {
        if (!Validator::validaNombre($nombre)) {
            $_SESSION['errores'] .= "El nombre introducido no tiene el formato correcto.";
        }
        if (!Validator::validaApellido($priApe)) {
            $_SESSION['errores'] .= "El primer apellido introducido es no tiene el formato corrercto.";
        }
        if (!Validator::validaEdad($edad)) {
            $_SESSION['errores'] .= "La edad introducida no es correcta.";
        }
        if (!Validator::validaDiagnostico($diagnostico)) {
            $_SESSION['errores'] .= "El diagnóstico introducido no es correcto.";
        }
    } else {
        $_SESSION['errores'] .= "Faltan datos en el formulario.";
    }

    if (empty($_SESSION)) {

    } else {
        header('Location: altaPacientes.php');
    }
?>