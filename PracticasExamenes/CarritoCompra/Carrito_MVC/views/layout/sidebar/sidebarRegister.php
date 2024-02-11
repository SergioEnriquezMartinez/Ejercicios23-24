<?php
use Manu\CarritoMvc\Config\Parameters;
if (!isset($_SESSION["user"])){
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
				<?php				
				if(isset($_SESSION['errores'])){
					foreach($_SESSION['errores'] as $error){
						if(isset($error["nombre"])){
							echo "<div class='alerta-error'>". $error["nombre"]."</div>";
						}
					}
				

				}
				?>
				<label for='idApellidos'>Apellidos</label>
				<input type='text' name='apellidos' id='idApellidos' />
				<?php
				if(isset($_SESSION['errores'])){
					foreach($_SESSION['errores'] as $error){
						if(isset($error["apellidos"])){
							echo "<div class='alerta-error'>". $error["apellidos"]."</div>";
						}
					}
				} 
				?>
				<label for='idEmail'>Email</label>
				<input type='text' name='email' id='idEmail' />
				<?php
				if(isset($_SESSION['errores'])){
					foreach($_SESSION['errores'] as $error){
						if(isset($error["email"])){
							echo "<div class='alerta-error'>". $error["email"]."</div>";
						}
					}
				} 
				if(isset($_SESSION['errores'])){
					foreach($_SESSION['errores'] as $error){
						if(isset($error["emailRegistrado"])){
							echo "<div class='alerta-error'>". $error["emailRegistrado"]."</div>";
						}
					}
				} 
				?>
				<label for='idPassword'>Contraseña</label>
				<input type='password' name='password' id='idPassword' />
				<label for='idPassword2'>Repite la contraseña</label>
				<input type='password' name='password2' id='idPassword2' />
				<?php
				if(isset($_SESSION['errores'])){
					foreach($_SESSION['errores'] as $error){
						if(isset($error["password"])){
							echo "<div class='alerta-error'>". $error["password"]."</div>";
						}
					}
				} 
				$_SESSION["errores"] = null;
				?> 
				<input type='submit' name='btnRegistro' value='Registrar' />			
			</form>
		</div>

<?php
	}
?>