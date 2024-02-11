<?php

namespace Manu\CarritoMvc\Controllers;
use Manu\CarritoMvc\Models\CategoriaModel;

class ViewController
{

    public static function show($viewName = null, $data = null)
    {
        self::showHeader();
        
        require_once $viewName;
        include 'views/layout/sidebar.php';
        self::showFooter();
    }

    public static function showHeader()
    {
        $categoriaModel = new CategoriaModel();
        $categorias = $categoriaModel->getAll();
        include 'views/layout/header.php';
    }
    public static function showFooter()
    {
        include 'views/layout/footer.php';
    }
    private static function showSidebar()
    {
        include 'views/layout/sidebar.php';
    }

    public static function mostrarMisDatos()
    {

        ViewController::show("views/entradas/showMisDatos.php");
    }
   
    
}
