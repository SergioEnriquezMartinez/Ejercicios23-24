<?php
namespace app;
//session_start();
$arrayCarrito = [];
if(isset($_SESSION['carrito'])){
$arrayCarrito = $_SESSION['carrito'];
}
if(isset($_POST['cantidad'])&&isset($_POST['productoId'])){
    if(intval($_POST['cantidad'])<=10 && intval($_POST['cantidad'])>0){

        $contadorProductos = count($arrayCarrito)+1;
        $key = 'producto'. $contadorProductos;
        $arrayProvisional = DAO::getProductos();
        $nombreProducto = "";
        
        foreach ($arrayProvisional as  $value) {
            if($value->getId() == intval($_POST['productoId'])){
                $arrayCarrito[$key]= [
                    'producto' => $value->getNombreProducto(),
                    'descripcion' => $value->getDescripcion(),
                    'precio' => $value->getPrecio(),
                    'unidades' => intval($_POST['cantidad']),
                    'subtotal' => intval($_POST['cantidad'])*$value->getPrecio()
                ];
                $nombreProducto = $value->getNombreProducto();
            }
        }
        echo "<pre>";
        print_r($arrayCarrito);
        echo"</pre>";
        echo  "<p>Se han añadido correctamente ". $_POST['cantidad'] ." unidad del producto".$nombreProducto." en el carrito de la compra</p>";
}else{
    echo "<p>Error las unidades debe ser un número esntero comprendido entre 1 y 10</p>";
}
$_SESSION['carrito'] = $arrayCarrito;

}
