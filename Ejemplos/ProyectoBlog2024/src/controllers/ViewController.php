<?php
namespace Mgj\ProyectoBlog2024\Controllers;
use Mgj\ProyectoBlog2024\Models\CategoriaModel;
use Mgj\ProyectoBlog2024\Controllers\ErrorController;
use Mgj\ProyectoBlog2024\Helpers\Authentication;

class ViewController{

    public static function show($viewName = null, $data = null){
        self::showHeader();
        self::showSidebar();
        require_once $viewName;
        self::showFooter();
    }
    
    public static function showError($error){
        self::showHeader();
        self::showSidebar();
        $metodoError = "show".$error;
        (new ErrorController())->$metodoError();
        self::showFooter();
    }

    private static function showHeader(){
        $categoriaModel = new CategoriaModel();
        $categorias = $categoriaModel->getAll();
        include 'views/layout/header.php';        
    }

    
    private static function showSidebar(){
        include 'views/layout/sidebar.php';
    }
    private static function showFooter(){
        include 'views/layout/footer.php';            
    }

}
