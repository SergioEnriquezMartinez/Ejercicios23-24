<?php
use Mgj\ProyectoBlog2024\Helpers\Authentication;
use Mgj\ProyectoBlog2024\Config\Parameters;

    if (Authentication::isUserLogged()){
		echo "<div id='usuario-logueado' class='bloque'>";

		echo "<h3> Bienvenid@, {$_SESSION['user']->nombre} {$_SESSION['user']->apellidos} </h3>";

		// Botones del usuario:
		echo "	<a href='".Parameters::$BASE_URL."Entrada/crearEntrada' class='boton boton-verde'>Crear entradas</a>
				<a href='".Parameters::$BASE_URL."Usuario/datos' class='boton boton-naranja'>Mis datos</a>
				<a href='".Parameters::$BASE_URL."Usuario/cerrarSesion' class='boton boton-rojo'>Cerrar sesión</a>";

		if (Authentication::isUserAdminLogged()){
			echo "<a href='".Parameters::$BASE_URL."Categoria/crear' class='boton'>Crear categoria</a>";
		}
						
				



		echo "</div>";
    }
?>