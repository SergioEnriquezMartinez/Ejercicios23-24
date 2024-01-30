<?php
    use Mgj\ProyectoBlog2024\Config\Parameters;
?>
    <div id='register' class='bloque'>
			<h3>Registrate</h3>
			<?php
				if (isset($_SESSION['statusRegister'])){
					if ($_SESSION['statusRegister'])
						echo "<div class='alerta'>Registro completado</div>";
					else
						echo "<div class='alerta alerta-error'>Error al registrar</div>";
					$_SESSION['statusRegister'] = null;
				}
			?>
			<form action='<?=Parameters::$BASE_URL?>Usuario/register' method='post'> 
				<label for='idNombre'>Nombre</label>
				<input type='text' name='nombre' id='idNombre' />
				<label for='idApellidos'>Apellidos</label>
				<input type='text' name='apellidos' id='idApellidos' />
				<label for='idEmail'>Email</label>
				<input type='text' name='email' id='idEmail' />
				<label for='idPassword'>Contraseña</label>
				<input type='password' name='password' id='idPassword' />
				<label for='idPassword2'>Repite la contraseña</label>
				<input type='password' name='password2' id='idPassword2' />
				<input type='submit' name='btnRegistro' value='Registrar' />			
			</form>
		</div>