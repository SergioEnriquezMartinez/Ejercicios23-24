<?php

use Sergi\ProyectoBlog\Ayudantes\Autenticacion;
use Sergi\ProyectoBlog\Ayudantes\ErrorHelper;
use Sergi\ProyectoBlog\Config\Parametros;

	if (!Autenticacion::isUserLogged()){
?>
    <div id='register' class='bloque'>
			<h3>Registrate</h3>
			<?php
				if (isset($_SESSION['statusRegister'])){
					if ($_SESSION['statusRegister'])
						echo "<div class='alerta'>Registro completado</div>";
					else
						echo "<div class='alerta alerta-error'>Error al registrar</div>";
				}
			?>
			<form action='<?=Parametros::$BASE_URL?>Usuario/register' method='post'> 
				<label for='idNombre'>Nombre</label>
				<input type='text' name='nombre' id='nombre' value='<?=$_SESSION["dataPOST"]["nombre"]??""?>'/>
				<?=isset($_SESSION["validation_error"]["nombre"])? ErrorHelper::mostrarError($_SESSION["validation_error"], "nombre") : "";?>

				<label for='idApellidos'>Apellidos</label>
				<input type='text' name='apellidos' id='apellidos' value='<?=$_SESSION["dataPOST"]["apellidos"]??""?>'/>
				<?=isset($_SESSION["validation_error"]["apellidos"])? ErrorHelper::mostrarError($_SESSION["validation_error"], "apellidos") : "";?>

				<label for='idEmail'>Email</label>
				<input type='text' name='email' id='email' value='<?=$_SESSION["dataPOST"]["email"]??""?>'/>
				<?=isset($_SESSION["validation_error"]["email"])? ErrorHelper::mostrarError($_SESSION["validation_error"], "emmail") : "";?>

				<label for='idPassword'>Contraseña</label>
				<input type='password' name='password' id='password' value='<?=$_SESSION["dataPOST"]["password"]??""?>'/>
				<?=isset($_SESSION["validation_error"]["password"])? ErrorHelper::mostrarError($_SESSION["validation_error"], "password") : "";?>

				<label for='idPassword2'>Repite la contraseña</label>
				<input type='password' name='password2' id='password2' value='<?=$_SESSION["dataPOST"]["password2"]??""?>'/>
				<?=isset($_SESSION["validation_error"]["password2"])? ErrorHelper::mostrarError($_SESSION["validation_error"], "password2") : "";?>

				<input type='submit' name='btnRegistro' value='Registrar' />			
			</form>
		</div>

<?php
	}
	ErrorHelper::clearAll();
?>