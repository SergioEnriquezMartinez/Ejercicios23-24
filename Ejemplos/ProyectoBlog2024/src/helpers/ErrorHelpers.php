<?php
namespace Mgj\ProyectoBlog2024\Helpers;

class ErrorHelpers{
	public static function showError($errores, $campo){
		$alerta = '';
		if(isset($errores[$campo]) && !empty($campo)){
			$alerta = "<div class='alerta alerta-error'>".$errores[$campo].'</div>';
		}		
		return $alerta;
	}

	public static function clearAll(){
		unset($_SESSION['validations_error']);
		unset($_SESSION['statusRegister']);
		unset($_SESSION['dataPOST']);		
	}
}

