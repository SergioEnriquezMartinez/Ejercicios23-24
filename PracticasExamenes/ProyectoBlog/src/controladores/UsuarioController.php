<?php
    namespace Sergi\ProyectoBlog\Controladores;

    use Psr\Log\LoggerInterface;
    use Sergi\ProyectoBlog\Modelos\UsuarioModelo;
    use Sergi\ProyectoBlog\Config\Parametros;
    use Sergi\ProyectoBlog\Entidades\UsuarioEntidad;
    use Sergi\ProyectoBlog\Ayudantes\Validaciones;
    use Sergi\ProyectoBlog\Ayudantes\LogFactory;

    class UsuarioController
    {
        private LoggerInterface $logger;

        public function __construct() {
            $this->logger = new LogFactory();
        }
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

                if (Validaciones::validarFormulario($nombre, $apellidos, $email, $password, $password2)) {
                    $usuarioModelo = new UsuarioModelo();
                    $usuario = new UsuarioEntidad();

                    $usuario->setNombre($nombre)->setApellidos($apellidos)->setEmail($email)->setPassword($password);
                    $_SESSION['statusRegister'] = $usuarioModelo->registro($usuario);
                } else {
                    $this->logger->debug('Error en el formulario de registro');
                    $this->logger->error('Error en el formulario de registro');
                }
            }
            header('Location: ' . Parametros::$BASE_URL);
        }
    }
?>