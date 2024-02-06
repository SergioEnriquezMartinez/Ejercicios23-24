<?php
use Mgj\ProyectoBlog2024\Config\Parameters;
use Mgj\ProyectoBlog2024\Helpers\Authentication;

if (!Authentication::isUserLogged()){
?>
	<div id='login' class='bloque'>
			<h3>Identificate</h3>

		<?php
			if(isset($_SESSION['errorLogin'])){
				echo "<div class='alerta alerta-error'>{$_SESSION['errorLogin']}</div>";
				unset($_SESSION['errorLogin']);
			}
		?>

			<form action='<?=Parameters::$BASE_URL?>Usuario/login' method='post'> 
				<label for='idLoginEmail'>Email</label>
				<input type='email' name='email' id='idLoginEmail' />

				<label for='idLoginPassword'>Contraseña</label>
				<input type='password' name='password' id='idLoginPassword' />

				<input type='submit' value='Entrar' name='btnLogin' />
			</form>
		</div>
<?php
}
?>
