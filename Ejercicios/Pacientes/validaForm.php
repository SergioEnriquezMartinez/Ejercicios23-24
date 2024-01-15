<?php

    use app\Validator;
    include_once 'app/Validator.php';
    include_once 'consultarEstados.php';
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

    if (empty($_SESSION['errores'])) {
        $consultaInsertarPaciente = "INSERT INTO paciente (nombre, priApe, edadIngreso, codEstado, diagnostico) VALUES (:nombre, :priApe, :edad, :estado, :diagnostico)";
        $sentenciaInsertarPaciente = $db->prepare($consultaInsertarPaciente);
        $sentenciaInsertarPaciente->bindParam(':nombre', $nombre);
        $sentenciaInsertarPaciente->bindParam(':priApe', $priApe);
        $sentenciaInsertarPaciente->bindParam(':edad', $edad);
        $sentenciaInsertarPaciente->bindParam(':diagnostico', $diagnostico);
        $estados = "";
        switch ($estado) {
            case 'Muy leve':
                $estados = 1;
                break;
            case 'Leve':
                $estados = 2;
                break;
            case 'Grave':
                $estados = 3;
                break;
            case 'Muy grave':
                $estados = 4;
                break;
            case 'Terminal':
                $estados = 5;
                break;
        }
        $sentenciaInsertarPaciente->bindParam(':estado', $estados);
        $sentenciaCorrecta = $sentenciaInsertarPaciente->execute();
        $_SESSION['estado'] = $_POST['estado'];
        if ($sentenciaCorrecta) $_SESSION['correcto'] = "<p>Paciente dado de alta correctamente.</p>";
    } 
    $_SESSION['nombre'] = $nombre;
    $_SESSION['priApe'] = $priApe;
    $_SESSION['edad'] = $edad;
    $_SESSION['diagnostico'] = $diagnostico;
    
    header('Location: altaPacientes.php');
?>