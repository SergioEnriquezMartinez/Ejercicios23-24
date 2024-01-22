<?php

namespace app;
 


const IVA = 1.21;
if (isset($_POST['productoId'])) {
    $_SESSION['verCarrito'] = $_POST['productoId'];
}

$tamanio = count($arrayCarrito);
if (isset($_SESSION['verCarrito'])) {
    echo '<form action="CarritoCompra.php" method="post">';
    echo '<label for="numProductos">Numero de Productos</label>';
    echo '<input type="number" name="numeroDePrductos" id="numeroDePrductos" value="' . $tamanio . '"readonly>';
    echo '<input type="submit" value="Ver Carrito/Realizar Compra" name="verCarrrito">';
    echo '</form>';
    if (isset($_POST['verCarrrito'])) {
        echo '<table border="1" class="tabla ">';
        echo "<caption>Carro</caption>";
        echo '<thead>';
        echo '<tr>';
        echo '<th>Producto</th>';
        echo '<th>Descripcion</th>';
        echo '<th>Precio (sin IVA)</th>';
        echo '<th>Precio (con IVA)</th>';
        echo '<th>Unidades</th>';
        echo '<th>Subtotal</th>';
        echo '<th>Eliminar</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        $subtotal = 0;
        foreach ($arrayCarrito as $key => $producto) {

            echo '<tr>';
            echo '<td>' . $producto['producto'] . '</td>';
            echo '<td>' . $producto['descripcion'] . '</td>';
            echo '<td>' . $producto['precio'] . '</td>';
            echo '<td>' . $producto['precio'] * IVA . '</td>';
            echo '<td>' . $producto['unidades'] . '</td>';
            echo '<td>' . $producto['subtotal'] = (($producto['precio'] * $producto['unidades']) * IVA) . '</td>';
            $subtotal += $producto['subtotal'] = (($producto['precio'] * $producto['unidades']) * IVA);
            echo '<td>';
            echo '<form action="CarritoCompra.php" method="post">';
            echo '<input type="submit" value="eliminar" >';
            echo '<input type="hidden" name="eliminarNombre" value="' . $producto['producto'] . '">';
            echo '</form>';
            echo '</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
        echo '<form action="CarritoCompra.php" method="post">';
        echo '<input type="submit" value="Vaciar Carrito Compra" name="vaciar">';
        echo '</form>';
        echo '<p class="subtotal">Total a pagar: ' . $subtotal . '</p>';
    }
}

if (isset($_POST['vaciar'])) {
    $_SESSION['vaciar'] = $_POST['vaciar'];
    $arrayCarrito = [];
    unset($_SESSION['carrito']);
    unset($_SESSION['verCarrito']);
    echo "<p>Se ha vaciado corerctamente el carrito de Compra</p>";
    header('Location: CarritoCompra.php');
}
