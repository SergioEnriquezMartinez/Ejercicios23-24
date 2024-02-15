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

        public function mostrarRegistro() {
            if (!Autenticacion::isUserLogged()) {
                // Vista
                VistaController::mostrar('vistas/usuarios/registro.php');
            }
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
                if (!Validaciones::validarPassword($password)) $errores['password'] = 'Formato de contraseña no válido, debe contener al menos una mayúscula, una minúscula, un número y un carácter especial';
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
            header('Location: ' . Parametros::$BASE_URL . 'Usuario/mostrarRegistro');
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
                    else $_SESSION['errorLogin'] = 'Credenciales incorrectas';
                } else $_SESSION['errorLogin'] = 'Usuario o contraseña no válido';
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
                // Vista
                VistaController::mostrar('vistas/usuarios/datosUsuario.php');
            }
        }

        public function actualizarDatosUsuario() {
            if (isset($_POST["btnActualizar"])) {
                $nombre = $_POST["nombre"];
                $apellidos = $_POST["apellidos"];
                $email = $_SESSION['user']->email;
                $id = $_SESSION['user']->id;

                $usuarioModelo = new UsuarioModelo();
                $errores = array();

                if (!Validaciones::validarPalabraRegistro($nombre)) $errores['nombre'] = 'Formato de nombre no válido';
                if (!Validaciones::validarPalabraRegistro($apellidos)) $errores['apellidos'] = 'Formato de apellidos no válido';

                $usuario = new UsuarioEntidad();
                $passChange = false;
                
                if ($_POST['password'] != '') {
                    $password = $_POST["password"];
                    $password2 = $_POST["password2"];
                    
                    if (!Validaciones::validarPassword($password)) $errores['password'] = 'Formato de contraseña no válido';
                    if ($password != $password2) $errores['password2'] = 'Las contraseñas no coinciden';
                    
                    if (empty($errores)) {
                        $usuario->setPassword($password);
                        $passChange = true;
                    }
                    
                } else {
                    $usuario->setPassword($_SESSION['user']->password);
                }
                if (empty($errores)) {
                    $usuario->setNombre($nombre)->setApellidos($apellidos)->setEmail($email)->setId($id);
                    $_SESSION['statusUpdate'] = $usuarioModelo->actualizarUsuario($usuario, $passChange);
                    $_SESSION['user'] = $usuario;
                } else {
                    $_SESSION['errorUpdate'] = $errores;
                }
            }
            header('Location: ' . Parametros::$BASE_URL . 'usuario/mostrarDatosUsuario');
        }

        public function misVotos() {
            if (Autenticacion::isUserLogged()) {
                $usuarioModelo = new UsuarioModelo();
                $votos = $usuarioModelo->getVotos($_SESSION['user']->id);
                
                // Vista
                VistaController::mostrar('vistas/usuarios/misVotos.php', ['votos' => $votos]);
            } else {
                header('Location: ' . Parametros::$BASE_URL);
            }
        }

        public function getCantidadVotos() {
            if (Autenticacion::isUserLogged()) {
                $usuarioModelo = new UsuarioModelo();
                $cantidadVotos = $usuarioModelo->getCantidadVotos($_SESSION['user']->id);
                echo json_encode($cantidadVotos);
            }
        }
    }
?>