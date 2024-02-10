<?php
    namespace Sergi\ProyectoBlog\Controladores;

    use Psr\Log\LoggerInterface;
    use Sergi\ProyectoBlog\Ayudantes\Autenticacion;
    use Sergi\ProyectoBlog\Ayudantes\LogFactory;
    use Sergi\ProyectoBlog\Config\Parametros;
    use Sergi\ProyectoBlog\Modelos\EntradaModelo;
    use Sergi\ProyectoBlog\Modelos\CategoriaModelo;
    use Zebra_Pagination;
    use Sergi\ProyectoBlog\Entidades\EntradaEntidad;
    use Sergi\ProyectoBlog\Modelos\UsuarioModelo;

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
            $info = 'Todas las entradas (Pagina ' . $paginacion->get_page() . ')';
            VistaController::mostrar('vistas/entradas/verTodasEntradas.php', ['entradas' => $entradas, 'pagination' => $paginacion, 'info' => $info]);
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

        public function mostrarCrearEntrada() {
            if (Autenticacion::isUserLogged()) {
                $categoriaModelo = new CategoriaModelo();
                $categorias = $categoriaModelo->getAll();

                // Vista
                VistaController::mostrar('vistas/entradas/crearEntrada.php', ['categorias' => $categorias]);
            } else {
                header('Location: ' . Parametros::$BASE_URL);
            }
        }

        public function crearEntrada() {
            if (Autenticacion::isUserLogged()) {
                if (isset($_POST['btnCrearEntrada'])) {
                    $titulo = $_POST['titulo'];
                    $descripcion = $_POST['descripcion'];
                    $categoriaId = $_POST['categoria'];
                    $usuarioId = $_SESSION['user']->id;

                    $errores = array();
                    if (empty($titulo)) $errores['titulo'] = 'El título no puede estar vacío';
                    if (empty($descripcion)) $errores['descripcion'] = 'La descripción no puede estar vacía';
                    if (empty($categoriaId)) $errores['categoria'] = 'Selecciona una categoria';

                    if (empty($errores)) {
                        $entradaEntity = new EntradaEntidad();
                        $entradaModelo = new EntradaModelo();
                        $entradaEntity->setTitulo($titulo)->setDescripcion($descripcion)->setCategoriaId($categoriaId)->setUsuarioId($usuarioId);
                        $entradaModelo->crearEntrada($entradaEntity);
                    } else {
                        $_SESSION['errorCrearEntrada'] = $errores;
                    }

                } else {
                    header('Location: ' . Parametros::$BASE_URL);
                }

            } else {
                header('Location: ' . Parametros::$BASE_URL);
            }
            header('Location: ' . Parametros::$BASE_URL . 'Entrada/mostrarCrearEntrada');
        }

        public function buscar() {
            if (isset($_POST['btnBuscar'])) {
                $criterio = $_POST['b'];
                $entradaModelo = new EntradaModelo();
                $entradas = $entradaModelo->buscar($criterio);

                // Vista
                VistaController::mostrar('vistas/entradas/entradasBusqueda.php', ['entradas' => $entradas]);
            } else {
                header('Location: ' . Parametros::$BASE_URL);
            }
        }

        public function verEntrada() {
            $idEntrada = $_GET['id'];
            if ($idEntrada) {
                $entradaModelo = new EntradaModelo();
                $entrada = $entradaModelo->getOne($idEntrada);
                $usuarioModelo = new UsuarioModelo();
                $usuario = $usuarioModelo->getOne($entrada->usuario_id);
                $categoriaModelo = new CategoriaModelo();
                $categoria = $categoriaModelo->getOne($entrada->categoria_id);

                // Vista
                VistaController::mostrar('vistas/entradas/verUnaEntrada.php', ['entrada' => $entrada, 'usuario' => $usuario, 'categoria' => $categoria]);
            }
        }

        public function mostrarDatosEntrada() {
            if (Autenticacion::isUserLogged()) {
                $idEntrada = $_GET['id'];
                if ($idEntrada) {
                    $entradaModelo = new EntradaModelo();
                    $entrada = $entradaModelo->getOne($idEntrada);
                    $categoriaModelo = new CategoriaModelo();
                    $categorias = $categoriaModelo->getAll();

                    // Vista
                    VistaController::mostrar('vistas/entradas/editarEntrada.php', ['entrada' => $entrada, 'categorias' => $categorias]);
                }
            } else {
                header('Location: ' . Parametros::$BASE_URL);
            }
        }

        public function editarEntrada() {
            if (Autenticacion::isUserLogged()) {
                if (isset($_POST['btnGuardar'])) {
                    $idEntrada = $_GET['id'];
                    $titulo = $_POST['titulo'];
                    $descripcion = $_POST['descripcion'];
                    $categoriaId = $_POST['categoria'];

                    $errores = array();
                    if (empty($titulo)) $errores['titulo'] = 'El título no puede estar vacío';
                    if (empty($descripcion)) $errores['descripcion'] = 'La descripción no puede estar vacía';
                    if (empty($categoriaId)) $errores['categoria'] = 'Selecciona una categoria';

                    if (empty($errores)) {
                        $entradaEntity = new EntradaEntidad();
                        $entradaModelo = new EntradaModelo();
                        $entradaEntity->setId($idEntrada)->setTitulo($titulo)->setDescripcion($descripcion)->setCategoriaId($categoriaId);
                        $entradaModelo->editarEntrada($entradaEntity);
                    } else {
                        $_SESSION['errorEditarEntrada'] = $errores;
                    }
                } else {
                    header('Location: ' . Parametros::$BASE_URL);
                }
            } else {
                header('Location: ' . Parametros::$BASE_URL);
            }
            header('Location: ' . Parametros::$BASE_URL . 'Entrada/mostrarDatosEntrada&id=' . $idEntrada);
        }

        public function eliminarEntrada() {
            if (Autenticacion::isUserLogged()) {
                $idEntrada = $_GET['id'];
                if ($idEntrada) {
                    $entradaModelo = new EntradaModelo();
                    $entradaModelo->borrarEntrada($idEntrada);
                }
            } else {
                header('Location: ' . Parametros::$BASE_URL);
            }
            header('Location: ' . Parametros::$BASE_URL . 'Entrada/all');
        }
    }
?>