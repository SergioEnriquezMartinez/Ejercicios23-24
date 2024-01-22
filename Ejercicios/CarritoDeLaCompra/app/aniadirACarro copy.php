<?php

namespace app;
//session_start();
$arrayCarrito = [];
if (isset($_SESSION['carrito'])) {
    $arrayCarrito = $_SESSION['carrito'];
}
$nombreProducto = "";
$productoFitlrado = "";
$productoEnCarrito = false;
foreach ($arrayProvisional as  $value) {
    if ($value->getId() == $_POST['productoId']) {
        $productoFitlrado = $value->getNombreProducto();
    }
}
foreach ($arrayCarrito as $key => $producto) {
    if ($producto['producto'] == $productoFitlrado && ($producto['unidades'] + $_POST['cantidad']) < 10) {
        $arrayProvisional = DAO::getProductos();
        $arrayCarrito[$key]['unidades'] += intval($_POST['cantidad']);
        $arrayCarrito[$key]['subtotal'] += intval($_POST['cantidad']) * $value->getPrecio();
        echo "<p>Producto en carrito</p>";
        $productoEnCarrito = true;
    } else {
        echo "<p>No se puede superar más de 10 unidades en un mismo producto</p>";
        $productoEnCarrito = true;
    }
}

if (isset($_POST['cantidad']) && isset($_POST['productoId']) &&$productoEnCarrito ==false) {
    if (intval($_POST['cantidad']) <= 10 && intval($_POST['cantidad']) > 0) {

        $contadorProductos = count($arrayCarrito) + 1;
        $key = 'producto' . $contadorProductos;
        $arrayProvisional = DAO::getProductos();
        $nombreProducto = "";






        foreach ($arrayProvisional as $key =>  $value) {

            if ($value->getId() == intval($_POST['productoId'])) {
                $arrayCarrito[$key] = [
                    'producto' => $value->getNombreProducto(),
                    'descripcion' => $value->getDescripcion(),
                    'precio' => $value->getPrecio(),
                    'unidades' => intval($_POST['cantidad']),
                    'subtotal' => intval($_POST['cantidad']) * $value->getPrecio()
                ];
                $nombreProducto = $value->getNombreProducto();
                $contadorProductos++;
            }
        }
        echo  "<p>Se han añadido correctamente " . $_POST['cantidad'] . " unidad del producto" . $nombreProducto . " en el carrito de la compra</p>";
    } else {
        echo "<p>Error las unidades debe ser un número esntero comprendido entre 1 y 10</p>";
    }
    $_SESSION['carrito'] = $arrayCarrito;
}
/*

$nombreProducto = "";
        $productoFitlrado ="";
        $productoEnCarrito = false;
        foreach ($arrayProvisional as  $value) {
            if($value->getId() == $_POST['productoId']){
                $productoFitlrado = $value->getNombreProducto();
            }
        }
        foreach ($arrayCarrito as $key => $producto) {
            if ($producto['producto'] == $productoFitlrado && ($producto['unidades'] + $_POST['cantidad'])<10) {
                $arrayCarrito[$key]['unidades'] += intval($_POST['cantidad']);
                $arrayCarrito[$key]['subtotal'] += intval($_POST['cantidad']) * $value->getPrecio();
                echo "<p>Producto en carrito</p>";
                $productoEnCarrito = true;
            } else{
                echo "<p>No se puede superar más de 10 unidades en un mismo producto</p>";
                $productoEnCarrito = true;
            }
        }
*/