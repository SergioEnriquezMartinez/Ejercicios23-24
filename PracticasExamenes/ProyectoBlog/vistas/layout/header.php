<?php
    use Sergi\ProyectoBlog\Config\Parametros;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- CABECERA -->
		<header id="cabecera">
			<!-- LOGO -->
			<div id="logo"><a href="<?=Parametros::$BASE_URL?>">Blog Alonso de Madrigal</a></div>
			
			<!-- MENU -->
			<nav id="menu">
				<ul>
					<li>
						<a href="<?=Parametros::$BASE_URL?>">Inicio</a>
					</li>
					<?php
					if ($categorias != NULL){
						foreach($categorias as $categoria){
							echo "<li> <a href='".Parametros::$BASE_URL."Entrada/categoria&id=".$categoria["id"]."'>".$categoria["nombre"]."</a></li>";
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
