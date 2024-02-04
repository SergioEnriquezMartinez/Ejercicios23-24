<?php
    namespace Sergi\ProyectoBlog\Controladores;
    use Sergi\ProyectoBlog\Modelos\CategoriaModelo;
    use Sergi\ProyectoBlog\Controladores\ErrorController;

    class VistasController
    {
        public static function mostrar($nombreVista = null, $datos = null) {
            self::mostrarHeader();
            self::mostrarSidebar();
            require_once $nombreVista;
            self::mostrarFooter();
        }
        

        public static function mostrarError($error) {
            self::mostrarHeader();
            self::mostrarSidebar();
            $metodoError = 'show' . $error;
            (new ErrorController())->$metodoError();
            self::mostrarFooter();
        }

        private static function mostrarHeader() {
            $categoriaModelo = new CategoriaModelo();
            $categorias = $categoriaModelo->getAll();
            include 'vistas/layout/header.php';
        }

        private static function mostrarSidebar() {
            include 'vistas/layout/sidebar.php';
        }

        private static function mostrarFooter() {
            include 'vistas/layout/footer.php';
        }
    }
?>