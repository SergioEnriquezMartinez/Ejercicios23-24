<?php

namespace app;
include_once "Categoria.php";
include_once "Producto.php";
use app\Producto;
use app\Categoria;

class DAO
{

    public static function getCategorias()
    {
        $categorias = array();
        $categorias[1] = new Categoria(1, "Portátiles");
        $categorias[2] = new Categoria(2, "Smartphones");
        $categorias[3] = new Categoria(3, "Televisiones");
        return $categorias;
    }

    public static function getProductos()
    {
        $productos = array();
        // Productos de la categoria 1:
        $productos[10] = new Producto(10, "Lenovo IdeaPad 3 15ITL6", "Intel Core i5-113567. 8GB. 512GB SSD. 15.6", 649, 1);
        $productos[11] = new Producto(11, "Asus ROG Strix G15 G513RM", "AMD Ryzen 7 6800H. 16GB. 1TB SSD. RTX3060. 15.6", 1299, 1);
        $productos[12] = new Producto(12, "HP 15S-FQ5013NS", "Intel Core i5-1235U. 8GB. 512GB SSd. 15.6", 699, 1);
        $productos[13] = new Producto(13, "ASUS Vivobook F1500EA", "Intel Core i7-1165G7. 16GB. 512Gb SSD. 15.6", 899, 1);
        // Productos de la categoria 2:
        $productos[100] = new Producto(100, "Xiaomi 11T pro", "Snapdragon 888. 256GB ROM 8GB RAM", 500, 2);
        $productos[101] = new Producto(101, "Huawei P40", "Kirin 999 128GB ROM 6GB RAM", 250, 2);
        $productos[102] = new Producto(102, "S22 ultra", "Exinos 2000 256GB ROM 12GB RAM", 1000, 2);
        $productos[103] = new Producto(103, "Nothing phone 1", "Snapdragon 758 256GB ROM 8GB RAM y tiene luces", 300, 2);
        // Productos de la categoria 3:
        $productos[300] = new Producto(300, "Xiaomi Mi TV P1", "UHD 4K, Smart TV, HDR10+, Control por voz", 1200, 3);
        $productos[301] = new Producto(301, "SAMSUNG TV QLED 65", "QLED 4K, Procesador QLED 4K, Smart TV", 300, 3);
        $productos[302] = new Producto(302, "LG 43UQ80006LB", "UHD 4K, Procesador Inteligente a5 Gen5 AI Processor 4K, Smart TV, DVB-T2", 759, 3);
        $productos[303] = new Producto(303, "Hisense 50A6BG", "4K UHD, Smart TV, Control por voz, HDR 10, HLG, Dolby Vision y Audio", 800, 3);
        return $productos;
    }

    // Método estático que tendría que retornar 
    // la Categoría que coincida con el id pasado como parámetro
    public static function getCategoria($idCategoria)
    {
        $categoria = DAO::getCategorias();
        $nombreCategoria = "";
        foreach ($categoria as $value) {
            if($value->getId()==$idCategoria){
                $nombreCategoria = $value->getNombreCategoria();
            }
        
        }
        return $nombreCategoria;
    }

    // Método estático que tendría que retornar
    // el Producto que coincida con el id recibido como parámetro
    public static function getProducto($idProducto)
    {
        $arrayProductosCategoria = self::getProductos();
        $arrayConID = [];
        foreach ($arrayProductosCategoria as $value) {
            $id = $value->getId();
            if($id == $idProducto){
                $arrayConID[] = $value;
            }
        }
        return $arrayConID;
    }
    
    // Método estático que tendría que retornar
    // la colección de productos de la categoria cuyo id 
    // coincida con el parámetro
    public static function getProductosCategoria($idCategoria)
    {
        $productos = DAO::getProductos();
        $productosFiltrados = [];
        foreach ($productos as $value) {
            if($value->getCategoria() == $idCategoria){
                $productosFiltrados[]=$value;
            }
        }
        return $productosFiltrados;
    }
}

echo "<pre>";
$categorias = DAO::getCategoria(3);
print_r($categorias);
echo "</pre>";

