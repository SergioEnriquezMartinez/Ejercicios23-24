<?php

use Sergi\ProyectoBlog\Ayudantes\Autenticacion;
use Sergi\ProyectoBlog\Config\Parametros;

if (Autenticacion::isUserLogged()) {
    $usuario = $_SESSION['user'];
    echo "<div id='user-logged' class='bloque'>";
    echo "<h3>Bienvenido, " . $usuario->nombre . " " . $usuario->apellidos . "</h3>";
    echo "<a href='" . Parametros::$BASE_URL . "Usuario/misVotos' class='boton boton-naranja'>Mis votos</a>";
    echo "<a href='" . Parametros::$BASE_URL . "Entrada/mostrarCrearEntrada' class='boton boton-verde'>Crear entrada</a>";
    echo "<a href='" . Parametros::$BASE_URL . "Categoria/mostrarCrearCategoria' class='boton boton-azul'>Crear categoría</a>";
    echo "<a href='" . Parametros::$BASE_URL . "Usuario/mostrarDatosUsuario' class='boton boton-naranja'>Mis datos</a>";
    echo "<a href='" . Parametros::$BASE_URL . "Usuario/logout' class='boton boton-rojo'>Cerrar sesión</a>";

    echo "</div>";
    if (!isset($_SESSION['redireccion_hecha'])) {
        $urlActual = $_SERVER['REQUEST_URI'];
        $parts = explode('/', $urlActual);
        $controller = isset($parts[1]) ? $parts[1] : Parametros::$CONTROLADOR_DEFECTO;
        $action = isset($parts[2]) ? $parts[2] : Parametros::$ACCION_DEFECTO;
        $urlConControladorAccion = "/$controller/$action";
        setcookie('ultimaPagina', $urlActual, time() + (86400 * 30), "/");
        $_SESSION['redireccion_hecha'] = true;

        if (isset($_COOKIE['ultimaPagina'])) {
            header('Location: ' . $_COOKIE['ultimaPagina']);
            exit;
        }
    }
}
?>