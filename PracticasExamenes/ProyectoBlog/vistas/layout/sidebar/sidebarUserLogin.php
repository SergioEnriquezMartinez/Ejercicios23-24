<?php

use Sergi\ProyectoBlog\Ayudantes\Autenticacion;
use Sergi\ProyectoBlog\Config\Parametros;

    if (Autenticacion::isUserLogged()){
        echo "<div id='user-logged' class='bloque'>";

        echo "<h3>Bienvenido, " . $_SESSION['user']->nombre . " " . $_SESSION['user']->apellidos . "</h3>";

        echo "<a href='" . Parametros::$BASE_URL . "Entrada/crearEntrada' class='boton boton-verde'>Crear entrada</a>";
        echo "<a href='" . Parametros::$BASE_URL . "Categoria/crearCategoria' class='boton boton-naranja'>Crear categoría</a>";
        echo "<a href='" . Parametros::$BASE_URL . "Usuario/datosUsuario' class='boton boton-naranja'>Mis datos</a>";
        echo "<a href='" . Parametros::$BASE_URL . "Usuario/logout' class='boton boton-rojo'>Cerrar sesión</a>";
        
        //if (Autenticacion::isUserAdminLogged()) echo "<a href='" . Parametros::$BASE_URL . "Categoria/crearCategoria' class='boton boton-naranja'>Crear categoría</a>";
        echo "</div>";
    }
?>