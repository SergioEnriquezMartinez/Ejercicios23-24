<?php

use Sergi\ProyectoBlog\Ayudantes\Autenticacion;
use Sergi\ProyectoBlog\Config\Parametros;

    if (Autenticacion::isUserLogged()){
        $usuario = $_SESSION['user'];
        echo "<div id='user-logged' class='bloque'>";
        echo "<h3>Bienvenido, " . $usuario->nombre . " " . $usuario->apellidos . "</h3>";

        echo "<a href='" . Parametros::$BASE_URL . "Entrada/mostrarCrearEntrada' class='boton boton-verde'>Crear entrada</a>";
        if (Autenticacion::isUserAdminLogged()) echo "<a href='" . Parametros::$BASE_URL . "Categoria/mostrarCrearCategoria' class='boton boton-azul'>Crear categoría</a>";
        echo "<a href='" . Parametros::$BASE_URL . "Usuario/mostrarDatosUsuario' class='boton boton-naranja'>Mis datos</a>";
        echo "<a href='" . Parametros::$BASE_URL . "Usuario/logout' class='boton boton-rojo'>Cerrar sesión</a>";
        
        echo "</div>";
    }
?>