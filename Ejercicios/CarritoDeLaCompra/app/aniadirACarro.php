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
        $enElCarro = false;
        if(count($arrayCarrito)>0){
            foreach ($arrayCarrito as $clave => $producto) {
                foreach ($producto as $atributo => $valor) {
                   if($valor == $_POST['productoId']){
                    $enElCarro = true;
                    $sumaUnidades=($arrayCarrito[$clave]['unidades']  + $_POST['cantidad']);
                    if($sumaUnidades <=10){
                        $arrayCarrito[$clave]['unidades']=$sumaUnidades;
                        echo  "<p class='correcto'>Se han añadido correctamente ". $_POST['cantidad'] ." unidad del producto".$arrayCarrito[$clave]['producto']." en el carrito de la compra</p>";
                    }else{
                        echo "<p class='error'>No se pueden tener más de 10 unidades del mismo producto</p>";
                    }
                   }
                }
                echo "\n";
            }
        }
            if($enElCarro !=true){
                foreach ($arrayProvisional as  $value) {
                    if($value->getNombreProducto() == $_POST['productoId']){
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
                echo  "<p class='correcto'>Se han añadido correctamente ". $_POST['cantidad'] ." unidad del producto".$nombreProducto." en el carrito de la compra</p>";
            }
            $enElCarro =false;
          
}else{
    echo "<p class='error'>Error las unidades debe ser un número esntero comprendido entre 1 y 10</p>";
}
$_SESSION['carrito'] = $arrayCarrito;

}
