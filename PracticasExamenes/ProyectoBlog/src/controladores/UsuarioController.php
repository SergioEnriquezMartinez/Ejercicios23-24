<?php
    namespace Sergi\ProyectoBlog\Controladores;

    use Sergi\ProyectoBlog\Ayudantes\Autenticacion;
    use Sergi\ProyectoBlog\Modelos\UsuarioModelo;
    use Sergi\ProyectoBlog\Config\Parametros;
    use Sergi\ProyectoBlog\Entidades\UsuarioEntidad;
    use Sergi\ProyectoBlog\Ayudantes\Validaciones;
    class UsuarioController
    {
        public function index() {
            echo '<p>Index para UsuarioController</p>';
        }

        public function register() {
            if (isset($_POST["btnRegistro"])) {
                $nombre = $_POST["nombre"];
                $apellidos = $_POST["apellidos"];
                $email = $_POST["email"];
                $password = $_POST["password"];
                $password2 = $_POST["password2"];

                $errores = array();

                if (!Validaciones::validarPalabraRegistro($nombre)) $errores['nombre'] = 'Formato de nombre no válido';
                if (!Validaciones::validarPalabraRegistro($apellidos)) $errores['apellidos'] = 'Formato de apellidos no válido';
                if (!Validaciones::validarEmailRegistro($email)) $errores['email'] = 'Formato de email no válido';
                if (!Validaciones::validarPassword($password)) $errores['password'] = 'Formato de contraseña no válido';
                if ($password != $password2) $errores['password2'] = 'Las contraseñas no coinciden';

                if (empty($errores)) {
                    $usuarioModelo = new UsuarioModelo();
                    $usuario = new UsuarioEntidad();

                    $usuario->setNombre($nombre)->setApellidos($apellidos)->setEmail($email)->setPassword($password);
                    $_SESSION['statusRegister'] = $usuarioModelo->registro($usuario);
                } else {
                    $_SESSION['dataPOST'] = $_POST;
                    $_SESSION['validation_error'] = $errores;
                }
            }
            header('Location: ' . Parametros::$BASE_URL);
        }

        public function login() {
            if (isset($_POST["btnLogin"])) {
                $email = trim($_POST["email"]) ?? '';
                $password = $_POST["password"] ?? '';

                $usuarioModelo = new UsuarioModelo();
                $usuario = $usuarioModelo->login($email);

                if ($usuario) {
                    $verify = password_verify($password, $usuario->password);
                    if ($verify) $_SESSION['user'] = $usuario;
                    else $_SESSION['errorLogin'] = 'Credenciales incorrectas 1';
                } else $_SESSION['errorLogin'] = 'Credenciales incorrectas 2';
            }
            header('Location: ' . Parametros::$BASE_URL);
            exit();
        }

        public function logout() {
            if (Autenticacion::isUserLogged()) session_destroy();
            header('Location: ' . Parametros::$BASE_URL);
            exit();
        }

        public function mostrarDatosUsuario() {
            if (Autenticacion::isUserLogged()) {
                $usuario = $_SESSION['user'];

                // Vista
                VistaController::mostrar('vistas/usuarios/datosUsuario.php', ['usuario' => $usuario]);
            }
        }
    }
?>