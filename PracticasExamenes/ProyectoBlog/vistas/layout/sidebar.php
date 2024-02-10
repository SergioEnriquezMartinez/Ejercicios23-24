<?php
	use Sergi\ProyectoBlog\Config\Parametros;
?>

<!-- BARRA LATERAL -->
	<aside id="sidebar">
	
		<div id="buscador" class="bloque">
			<h3>Buscar</h3>

			<form action='<?=Parametros::$BASE_URL?>Entrada/buscar' method='post'> 
				<input type="text" name="b" />
				<input type="submit" value="Buscar" name="btnBuscar"/>
			</form>
		</div>
	
		<?php
			include_once("sidebar/sidebarLogin.php");
			include_once("sidebar/sidebarRegister.php");
			include_once("sidebar/sidebarUserLogin.php");
		?>

	</aside>

	<!-- Capa Principal -->
	<div id="principal">