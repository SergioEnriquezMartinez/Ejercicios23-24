<?php
	use Mgj\ProyectoBlog2024\Config\Parameters;
?>
<!DOCTYPE HTML>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<title>Blog Alonso de Madrigal</title>
		<link rel="stylesheet" type="text/css" href="<?=Parameters::$BASE_URL?>assets/css/style.css" />
	</head>
	<body>
		<!-- CABECERA -->
		<header id="cabecera">
			<!-- LOGO -->
			<div id="logo"><a href="<?=Parameters::$BASE_URL?>">Blog Alonso de Madrigal</a></div>
			
			<!-- MENU -->
			<nav id="menu">
				<ul>
					<li>
						<a href="<?=Parameters::$BASE_URL?>">Inicio</a>
					</li>
					<?php
					if ($categorias != NULL){
						foreach($categorias as $categoria){
							echo "<li> <a href='".Parameters::$BASE_URL."Entrada/categoria&id=".$categoria["id"]."'>".$categoria["nombre"]."</a></li>";
						}
					}
					?>

					<li> <a href="">Sobre mí</a></li>
					<li> <a href="">Contacto</a></li>						
					
					
				</ul>
			</nav>
			
			<div class="clearfix"></div>
		</header>
		
	<div id="contenedor">	

	<!--
	http://localhost/Ejercicios_23-24/ProyectoBlog2024/
	http://localhost/Ejercicios_23-24/ProyectoBlog2024/Entrada/categoria&id=9
	http://localhost/Ejercicios_23-24/ProyectoBlog2024/Entrada/Entrada/categoria&id=9
	http://localhost/Ejercicios_23-24/ProyectoBlog2024/Entrada/Entrada/Entrada/categoria&id=10
	->