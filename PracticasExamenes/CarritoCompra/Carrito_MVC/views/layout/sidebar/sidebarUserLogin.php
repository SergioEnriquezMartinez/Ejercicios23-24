<?php

use Manu\CarritoMvc\Config\Parameters;
//var_dump($_SESSION["user"]);
if (isset($_SESSION["user"])) {
    $usuario = $_SESSION["user"];
    echo "<h1>Bienvenid@, " . $usuario["nombre"] . " " . $usuario["apellido"] . "</h1>";
    echo "<div id='' class='bloque'>";
    echo "<a href='" . Parameters::$BASE_URL . "View/mostrarFormularioEntrada'><div class= 'boton boton-verde'>Crear Entrada</div></a>";
    /*if ($usuario["rol"] == "admin") {

        echo "<a href='" . Parameters::$BASE_URL . "Categoria/mostrarFormulario'><div class= 'boton boton'>Crear Producto</div></a>";
    }*/
    echo "<a href='" . Parameters::$BASE_URL . "Pedido/mostrarPedido'><div class= 'boton boton-naranja'>Mis pedidos</div></a>";
    echo "<a href='" . Parameters::$BASE_URL . "Usuario/closeSesion'><div class= 'boton boton-rojo'>Cerrar Sesion</div></a>";
    echo "</div>";
}
