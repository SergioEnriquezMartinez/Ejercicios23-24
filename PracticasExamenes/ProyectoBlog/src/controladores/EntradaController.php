<?php
    namespace Sergi\ProyectoBlog\Controladores;

    use Psr\Log\LoggerInterface;
    use Sergi\ProyectoBlog\Ayudantes\LogFactory;
    use Sergi\ProyectoBlog\Config\Parametros;
    use Sergi\ProyectoBlog\Modelos\EntradaModelo;
    use Sergi\ProyectoBlog\Modelos\CategoriaModelo;
    use Zebra_Pagination;

    class EntradaController
    {
        private LoggerInterface $logger;

        public function __construct() {
            $this->logger = LogFactory::getLogger();
        }

        public function index($parametro) {
            echo '<p>Index de EntradaController</p>';
        }

        /*
        // Recupera la información sin paginar
        public function all() {
            $entradaModelo = new EntradaModelo();
            $entradas = $entradaModelo->getEntradas();
         
            // Vista:
            VistaController::show('vistas/entradas...', ['entradas' => $entradas])
        }
        */

        public function all() {
            $entradaModelo = new EntradaModelo();

            // Paginación
            $paginacion = new Zebra_Pagination();
            $paginacion->base_url(Parametros::$BASE_URL . 'Entrada/all', false);

            $numeroEntradas = $entradaModelo->getAllCount();

            $paginacion->records($numeroEntradas);
            $paginacion->records_per_page(Parametros::$ENTRADAS_POR_PAGINA);

            $page = $_GET["page"]??1;

            $regOrigen = ($page - 1) * Parametros::$ENTRADAS_POR_PAGINA;
            $entradas = $entradaModelo->getEntradas($regOrigen, Parametros::$ENTRADAS_POR_PAGINA);

            $this->logger->info('Metodo all: Paginación', ["page" => $page, "regOrigen" => $regOrigen]);
            $this->logger->debug('Metodo all: Paginación', ["page" => $page, "regOrigen" => $regOrigen]);
            $this->logger->error('Metodo all: Paginación', ["page" => $page, "regOrigen" => $regOrigen]);

            // Obtenemos información para la generación del PDF
            // $_SESSION['entradasPDF'] = $entradas; // Entradas paginadas
            $_SESSION["entradasPDF"] = $entradaModelo->getEntradas();
            $_SESSION["tituloPDF"] = "Listado de entradas";

            // Vista
            $info = 'Todas las entradas (Página {$paginacion->get_page()}';
            VistaController::mostrar('vistas/entradas/verTodasEntradas.php', ['entradas' => $entradas, 'paginacion' => $paginacion, 'info' => $info]);
        }

        public function ultimasEntradas() {
            $entradaModelo = new EntradaModelo();
            $entradas = $entradaModelo->getLastEntradas();

            // Vista
            VistaController::mostrar('vistas/entradas/verUltimasEntradas.php', ['entradas' => $entradas]);
        }

        public function entradasCategoria() {
            // Recogemos el id de la categoria
            $idCategoria = $_GET["id"];

            if ($idCategoria) {
                $categoriaModelo = new CategoriaModelo();
                $categoria = $categoriaModelo->getOne($idCategoria);
                
                $entradaModelo = new EntradaModelo();
                $entradas = $entradaModelo->getEntradasCategoria($idCategoria);

                // Vista
                $_SESSION["entradasPDF"] = $entradas;
                $_SESSION["tituloPDF"] = "Listado de entradas de la categoría {$categoria->nombre}";
                VistaController::mostrar('vistas/entradas/verEntradasCategoria.php', ['entradas' => $entradas, 'categoria' => $categoria]);
            }
        }
    }
?>