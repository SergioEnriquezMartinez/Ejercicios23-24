<?php
    use Mgj\ProyectoBlog2024\Config\Parameters;
	use Mgj\ProyectoBlog2024\Helpers\Authentication;
	use Mgj\ProyectoBlog2024\Helpers\ErrorHelpers;

if (!Authentication::isUserLogged()){
?>
    <div id='register' class='bloque'>
			<h3>Regístrate</h3>
			<?php
				if (isset($_SESSION['statusRegister'])){
					if ($_SESSION['statusRegister'])
						echo "<div class='alerta'>Registro completado</div>";
					else
						echo "<div class='alerta alerta-error'>Error al registrar</div>";
				}
			?>
			<form action='<?=Parameters::$BASE_URL?>Usuario/register' method='post'> 
				<label for='idNombre'>Nombre</label>
				<input type='text' name='nombre' id='idNombre' value='<?=$_SESSION["dataPOST"]["nombre"]??""?>'/>
				<?=isset($_SESSION['validations_error']['nombre']) ? ErrorHelpers::showError($_SESSION['validations_error'], 'nombre') : '';?>

				<label for='idApellidos'>Apellidos</label>
				<input type='text' name='apellidos' id='idApellidos' value='<?=$_SESSION["dataPOST"]["apellidos"]??""?>'/>
				<?=isset($_SESSION['validations_error']['apellidos']) ? ErrorHelpers::showError($_SESSION['validations_error'], 'apellidos') : '';?>

				<label for='idEmail'>Email</label>
				<input type='text' name='email' id='idEmail' value='<?=$_SESSION['dataPOST']['email']??""?>'/>
				<?=isset($_SESSION['validations_error']['email']) ? ErrorHelpers::showError($_SESSION['validations_error'], 'email') : '';?>

				<label for='idPassword'>Contraseña</label>
				<input type='password' name='password' id='idPassword' value='<?=$_SESSION["dataPOST"]["password"]??""?>'/>
				<?=isset($_SESSION['validations_error']['password']) ? ErrorHelpers::showError($_SESSION['validations_error'], 'password') : '';?>

				<label for='idPassword2'>Repite la contraseña</label>
				<input type='password' name='password2' id='idPassword2' value='<?=$_SESSION["dataPOST"]["password2"]??""?>'/>
				<?=isset($_SESSION['validations_error']['password2']) ? ErrorHelpers::showError($_SESSION['validations_error'], 'password2') : '';?>

				<input type='submit' name='btnRegistro' value='Registrar' />			
			</form>
		</div>
		

<?php
	}
		ErrorHelpers::clearAll();
	
?>