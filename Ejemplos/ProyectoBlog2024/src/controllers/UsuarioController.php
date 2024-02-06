<?php

namespace Mgj\ProyectoBlog2024\Controllers;

use Mgj\ProyectoBlog2024\Models\UsuarioModel;
use Mgj\ProyectoBlog2024\Helpers\Validations;
use Mgj\ProyectoBlog2024\Entities\UserEntity;
use Mgj\ProyectoBlog2024\Config\Parameters;
use Mgj\ProyectoBlog2024\Helpers\Authentication;

class UsuarioController
{
    public function index()
    {
    }

    public function register()
    {
        if (isset($_POST['btnRegistro'])) {
            // Validar:
            $errores = array();
            if (!Validations::validateName($_POST['nombre']))   $errores['nombre'] = "Formato nombre no válido";
            if (!Validations::validateName($_POST['apellidos'])) $errores['apellidos'] = "Formato apellidos no válido";
            if (!Validations::validateEmail($_POST['email']))   $errores['email'] = "Formato email no válido";
            if (!Validations::validateFormatPassword($_POST['password'])) $errores['password'] = "Formato password no válido";
            if ($_POST['password'] != $_POST['password2'])  $errores['password2'] = "Las dos passwords deben coincidir";

            if (empty($errores)) {
                $usuarioModel = new UsuarioModel();

                $user = new UserEntity();
                $user->setNombre($_POST["nombre"])
                    ->setApellidos($_POST["apellidos"])
                    ->setEmail($_POST["email"])
                    ->setPassword(($_POST["password"]));

                $_SESSION["statusRegister"] = $usuarioModel->register($user);
            } else {
                $_SESSION['dataPOST'] = $_POST;
                $_SESSION['validations_error'] = $errores;
            }
        }

        header("Location: " . Parameters::$BASE_URL);
    }

    public function login()
    {

        if (isset($_POST["btnLogin"])) {
            // Recoger datos del formulario
            $email = trim($_POST["email"])??"";
            $password = $_POST["password"]??"";
            
            $usuarioModel = new UsuarioModel();
            $usuario = $usuarioModel->login($email);
            
            if ($usuario) {
                // Comprobar la contraseña
                $verify = password_verify($password, $usuario->password);

                if ($verify) $_SESSION['user'] = $usuario;
                else $_SESSION['errorLogin'] = "Login incorrecto!!";
                
            } else {
                $_SESSION['errorLogin'] = "Login incorrecto!!";
            }
        }

        header("Location: " . PARAMETERS::$BASE_URL);
        exit();
    }

    
    public function cerrarSesion()
    {
        if (Authentication::isUserLogged()) unset($_SESSION['user']);
        //session_destroy();
        
        header("Location: " . PARAMETERS::$BASE_URL);
        exit();
    }
}
