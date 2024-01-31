<?php
namespace Mgj\ProyectoBlog2024\Controllers;

use Mgj\ProyectoBlog2024\Models\EntradaModel;
use Mgj\ProyectoBlog2024\Models\CategoriaModel;
use Mgj\ProyectoBlog2024\Config\Parameters;
use Zebra_Pagination;
use Mgj\ProyectoBlog2024\Helpers\LogFactory;
use Psr\Log\LoggerInterface;

class EntradaController{
    private LoggerInterface $log;

    public function __construct(){
        $this->log = LogFactory::getLogger("EntradaController");
    }

    public function index($param){
        echo "<p> Index de EntradaController</p>";
    }
    /* 
        // Recupera la información SIN PAGINAR
    public function all(){
        $entradaModel = new EntradaModel();
        $entradas = $entradaModel->getEntradas();
        // Vista:    
        ViewController::show('views/entradas/showAllEntradas.php', ["entradas" => $entradas]);
    }
    */
    
    public function all(){
        $entradaModel = new EntradaModel();
        // Paginación:
        $pagination = new Zebra_Pagination();
        $pagination->base_url(Parameters::$BASE_URL."Entrada/all", false);
        $numEntradas = $entradaModel->getAllCount();

        $pagination->records($numEntradas);
        $pagination->records_per_page(Parameters::$PAGINATION_NUM_RECORDS);

        $page = $_GET["page"]??1;
        
        $regOrigen = ($page - 1) * Parameters::$PAGINATION_NUM_RECORDS;
        $entradas = $entradaModel->getEntradas($regOrigen, Parameters::$PAGINATION_NUM_RECORDS);

        $this->log->debug("DEBUG. Metodo All: Paginacion", ["page" => $page, "regOrigen" => $regOrigen]);
        $this->log->error("ERROR. Metodo All: Paginacion", ["page" => $page, "regOrigen" => $regOrigen]);

        // Vista:    
        $info = "Todas las entradas (Página {$pagination->get_page()})";
        ViewController::show('views/entradas/showAllEntradas.php', ["entradas" => $entradas, "pagination" => $pagination, "info" => $info]);
    }

    public function last(){
            $entradaModel = new EntradaModel();
            $entradas = $entradaModel->getLastEntradas();
            // Vista:       
            ViewController::show('views/entradas/showLastEntradas.php', ["entradas" => $entradas]);
    }
    public function categoria(){
        // Necesita el parámetro id 
        $idCategoria = $_GET["id"]??null;

        if ($idCategoria){
            $categoriaModel = new CategoriaModel();
            $categoria = $categoriaModel->getOne($idCategoria);

            $entradaModel = new EntradaModel();
            $entradas = $entradaModel->getEntradasCategoria($idCategoria);

            // Vista:
            ViewController::show('views/entradas/showEntradasCategoria.php', ["entradas" => $entradas, "categoria" => $categoria]);
        }
    }

}
