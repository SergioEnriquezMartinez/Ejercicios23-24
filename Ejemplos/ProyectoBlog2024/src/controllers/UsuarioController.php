<?php
namespace Mgj\ProyectoBlog2024\Controllers;
use Mgj\ProyectoBlog2024\Models\UsuarioModel;
use Mgj\ProyectoBlog2024\Helpers\Validations;
use Mgj\ProyectoBlog2024\Entities\UserEntity;
use Mgj\ProyectoBlog2024\Config\Parameters;

class UsuarioController{
    public function index(){
        echo "<p> Index de UsuarioController</p>";
    }
    public function register(){
        if (isset($_POST['btnRegistro'])){
            // Validar:
            $errores = array();

            if (empty($errores)){
                $usuarioModel = new UsuarioModel();

                $user = new UserEntity();
                $user->setNombre($_POST["nombre"])
                        ->setApellidos($_POST["apellidos"])
                        ->setEmail($_POST["email"])
                        ->setPassword(($_POST["password"]));

                $_SESSION["statusRegister"] = $usuarioModel->register($user);

            }
        }

        header("Location: " . Parameters::$BASE_URL);

    }
}