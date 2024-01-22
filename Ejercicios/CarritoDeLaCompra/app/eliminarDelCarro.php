<?php

namespace app;
$_SESSION['delete'] = false;

if (isset($_POST['eliminarNombre'])) {

    foreach ($arrayCarrito as $key => $producto) {
        if ($producto['producto'] == $_POST['eliminarNombre']) {
            unset($arrayCarrito[$key]);
        }
    }
    $_SESSION['carrito'] = $arrayCarrito;
}
