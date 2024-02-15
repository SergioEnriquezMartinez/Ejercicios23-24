<?php
    namespace Sergi\ProyectoBlog\Controladores;

    use Sergi\ProyectoBlog\Ayudantes\Autenticacion;
    use Sergi\ProyectoBlog\Ayudantes\Validaciones;
    use Sergi\ProyectoBlog\Entidades\CategoriaEntidad;
    use Sergi\ProyectoBlog\Modelos\CategoriaModelo;
    use Sergi\ProyectoBlog\Config\Parametros;

    class CategoriaController {
        public function index() {
            echo '<p>Index para CategoriaController</p>';
        }

        public function mostrarCrearCategoria() {

                VistaController::mostrar('vistas/categorias/crearCategoria.php');
            
        }

        public function crearCategoria() {
                if (isset($_POST['btnCrearCategoria'])) {
                    $error = array();
                    if (!Validaciones::validarPalabraRegistro($_POST['nombre'])) $error['nombre'] = 'Formato de nombre no válido';
                    if (empty($_SESSION['errorCrearCategoria'])) {
                        $nombre = $_POST['nombre'];
                        $categoria = new CategoriaEntidad();
                        $categoria->setNombre($nombre);
                        $categoriaModelo = new CategoriaModelo();
                        $categoriaModelo->crearCategoria($categoria);
                    } else {
                        $_SESSION['errorCrearCategoria'] = $error;
                    }
                }
            header('Location: ' . Parametros::$BASE_URL . 'categoria/mostrarCrearCategoria');
        }
    }
?>