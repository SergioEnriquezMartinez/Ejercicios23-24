<?php

namespace Manu\CarritoMvc\Controllers;

use Manu\CarritoMvc\Config\Parameters;
use Manu\CarritoMvc\Models\ProductosModel;
use Manu\CarritoMvc\Models\CategoriaModel;

class CartController
{
    public function addToCart()
    {
        if (isset($_GET["id"])) {
            $producto = new ProductosModel();
            $id = intval($_GET["id"]);
            $resultado = $producto->getOne($id);
            $_SESSION["cart"] = $_SESSION["cart"] ?? [];
            $encontrado = false;
            foreach ($_SESSION["cart"]  as &$value) {
                if($value["id"]== $resultado["id"]){
                    $value["cantidad"] = $value["cantidad"] + 1; 
                    $encontrado = true;

                }
            }
            if (!$encontrado) {
                $resultado["cantidad"] = 1; 
                $_SESSION["cart"][] = $resultado;
            }
            //array_push($_SESSION["cart"], $resultado);
            $_SESSION["addStatus"] = true;
            $_SESSION["server"] = $_SERVER['HTTP_REFERER'];
            $pagina_anterior = $_SERVER['HTTP_REFERER'] ?? 'index.php'; // Establece una página predeterminada si no hay Referer
            echo header("Location: $pagina_anterior");
            exit();
        }
    }
    public function mostrar()
    {
        ViewController::show('views/entradas/showCarrito.php');
    }
    public function delete()
    {
        if (isset($_GET["id"])) {
            foreach ($_SESSION["cart"] as $clave => $producto) {
                if ($producto["id"] == $_GET["id"]) {
                    unset($_SESSION["cart"][$clave]);
                }
            }
        }
        if(empty($_SESSION["cart"])){
            unset($_SESSION["cart"]);
        }
        
        $pagina_anterior = $_SERVER['HTTP_REFERER'] ?? 'index.php'; // Establece una página predeterminada si no hay Referer
        echo header("Location: $pagina_anterior");
        exit();
    }
    public function vaciarCarro()
    {
        session_destroy();
        $base = Parameters::$BASE_URL;
        echo header("Location: $base");
    }
}
