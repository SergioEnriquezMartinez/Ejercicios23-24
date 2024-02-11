<?php

use Manu\CarritoMvc\Config\Parameters;

if(!isset($_SESSION["user"])){

	?>
<div id="login">
	<h2>Introduzca sus datos para loguearse</h2>
	<div idhijopLogin>
		<form action='<?=Parameters::$BASE_URL?>Usuario/login' method="post">
			<?php
			if (isset($_SESSION['errores'])) {
				foreach ($_SESSION['errores'] as $error) {
					if (isset($error["errorPass"])) {
						echo "<div class='alerta-error'>" . $error["errorPass"] . "</div>";
					}
				}
				
			}
			
			?>
			<label for="correo">Correo</label>
			<input type="email" name="email" id="correoLogin">
			<label for="correo">Password</label>
			<input type="password" name="password" id="passwordLogin">
			
			<input type="submit" value="Login">
		</form>
	</div>
</div>
<?php
}