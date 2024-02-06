<?php

use Sergi\ProyectoBlog\Ayudantes\Autenticacion;
use Sergi\ProyectoBlog\Config\Parametros;

	if (!Autenticacion::isUserLogged()) {
?>
	<div id='login' class='bloque'>
			<h3>Identificate</h3>

			<?php
				if (isset($_SESSION['errorLogin'])){
					echo "<div class='alerta alerta-error'>".$_SESSION['errorLogin']."</div>";
					unset($_SESSION['errorLogin']);
				}
			?>

			<form action='<?=Parametros::$BASE_URL?>Usuario/login' method='post'> 
				<label for='idLoginEmail'>Email</label>
				<input type='email' name='email' id='email' />

				<label for='idLoginPassword'>Contraseña</label>
				<input type='password' name='password' id='password' />

				<input type='submit' value='Entrar' name='btnLogin' />
			</form>
		</div>
<?php
	}
?>
