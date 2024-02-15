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
				$ultimoUsuario = isset($_COOKIE['ultimo_usuario']) ? $_COOKIE['ultimo_usuario'] : '';
			?>

			<form action='<?=Parametros::$BASE_URL?>Usuario/login' method='post'> 
				<label for='idLoginEmail'>Email</label>
				<input type='email' name='email' id='email' value='<?php echo htmlspecialchars($ultimoUsuario); ?>'/>

				<label for='idLoginPassword'>Contraseña</label>
				<input type='password' name='password' id='password' />

				<input type='submit' value='Entrar' name='btnLogin' />
			</form>
		</div>
<?php
	} else {
		if (isset($_SESSION['usuario'])) {
			$ultimoUsuario = $_SESSION['usuario']['email'];
			setcookie('ultimo_usuario', $ultimoUsuario, time() + (30 * 24 * 60 * 60), '/');
		}
	}
?>
