<?php

namespace Manu\CarritoMvc\Controllers;

use Manu\CarritoMvc\Models\ProductosModel;
use Manu\CarritoMvc\Models\CategoriaModel;

class EntradaController
{
    public function index()
    {
        echo "<p>Index de Entrada Controller</p>";
        ViewController::show('views/entradas/showAllEntradas.php');
    }
    public function getAll()
    {
        $productos = new ProductosModel();
        $todosLosProductos = $productos->getEntradas();
        ViewController::show('views/entradas/showAllEntradas.php', ["entradas" => $todosLosProductos]);
    }
    public function categoria()
    {
        $entradasCategoria = new CategoriaModel();
        $categoriaModel = new CategoriaModel();
        $idCategoria = $_GET['id'] ?? null;
        $categoria = $categoriaModel->getOne($idCategoria);
        if (isset($_GET["id"])) {
            $resultadoEntrada = $entradasCategoria->getEntradasCategoria($_GET["id"]);

            ViewController::show('views/entradas/showEntradasCateogorias.php', ["entradas" =>$resultadoEntrada, "categoria"=>$categoria]);
        }
    }
}
