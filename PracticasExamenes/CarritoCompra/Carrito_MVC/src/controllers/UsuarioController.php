<?php

namespace Manu\CarritoMvc\Controllers;
use Manu\CarritoMvc\Entities\UserEntity;
use Manu\CarritoMvc\Models\UsuarioModel;
use Manu\CarritoMvc\Helpers\Validations;
use Manu\CarritoMvc\Config\Parameters;
class UsuarioController{
    public function register()
    {
        $errores = [];
        if (isset($_POST["btnRegistro"]) && isset($_POST["nombre"]) && isset($_POST["apellidos"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["password2"])) {
            if (!Validations::validaName($_POST["nombre"])) {
                $errores[] = ["nombre" => "<p>Formato nombre no válido</p>"];
            }
            if (!Validations::validaName($_POST["apellidos"])) {
                $errores[] = ["apellidos" => "<p>Formato apellido no válido</p>"];
            }
            if (!Validations::validaMail($_POST["email"])) {
                $errores[] = ["email" => "<p>Formato Email no válido</p>"];
            }
            if (isset($_POST["email"])) {
                $pruebas = new UsuarioModel();
                $resultado = $pruebas->getDato("correo", $_POST["email"]);
                if (Validations::existeEmail("correo", $_POST["email"])) {
                    $errores[] = ["emailRegistrado" => "<p>El Email ya se encuentra registrado en el sistema</p>"];
                }
            }
            if (Validations::iguales($_POST["password"], $_POST["password2"])) {
                if (!Validations::validaPass($_POST["password"])) {
                    $errores[] = ["password" => "<p>Formato password no válido</p>"];
                }
            } else {
                $errores[] = ["iguales" => "<p>Error Las contraseñas deben coincidir</p>"];
            }
        }

        if (empty($errores)) {
            $usuarioModel = new UsuarioModel();
            $user = new UserEntity();
            $user->setNombre($_POST["nombre"])
                ->setApellidos($_POST["apellidos"])
                ->setEmail($_POST["email"])
                ->setPassword($_POST["password"]);
            $_SESSION["statusRegister"] = $usuarioModel->register($user);
        } else {
            $_SESSION["errores"] = $errores;
        }
        header("Location: " . Parameters::$BASE_URL);
    }
    public function login()
    {
        $errores = [];
        if (isset($_POST['email']) && isset($_POST["password"])) {
            if (!Validations::validaMail($_POST["email"])) {
                $errores[] = ["email" => "<p>Login incorrecto!!!</p>"];
            }
            if (isset($_POST["email"])) {
                if (!Validations::existeEmail("correo", $_POST["email"])) {
                    $errores[] = ["emailNoRegistrado" => "<p>Login incorrecto!!!</p>"];
                }
            }
            if (isset($_POST["password"])) {
                if (!Validations::validatePasswd($_POST["password"], $_POST["email"])) {
                    $errores[] = ["errorPass" => "<p>Login incorrecto!!!</p>"];
                }
            }
        }
        if (empty($errores)) {
            $datosUsuario = new UsuarioModel();
            $usuario = $datosUsuario->getDato("correo", $_POST["email"]);
            $_SESSION['user'] = $usuario;
        } else {
            $_SESSION["errores"] = $errores;
        }
        header("Location: " . Parameters::$BASE_URL);
    }
    public function closeSesion()
    {
        session_destroy();
        header("Location: " . Parameters::$BASE_URL);
    }
    
}