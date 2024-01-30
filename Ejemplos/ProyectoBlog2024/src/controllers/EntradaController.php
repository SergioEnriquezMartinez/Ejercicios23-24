<?php
namespace Mgj\ProyectoBlog2024\Controllers;

use Mgj\ProyectoBlog2024\Models\EntradaModel;
use Mgj\ProyectoBlog2024\Models\CategoriaModel;

class EntradaController{
    public function index($param){
        echo "<p> Index de EntradaController</p>";
    }

    public function all(){
        $entradaModel = new EntradaModel();
        $entradas = $entradaModel->getAll();
        // Vista:    
        ViewController::show('views/entradas/showAllEntradas.php', ["entradas" => $entradas]);
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
