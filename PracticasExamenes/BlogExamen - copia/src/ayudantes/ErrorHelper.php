<?php
    namespace Sergi\ProyectoBlog\Ayudantes;

    class ErrorHelper 
    {
        public static function mostrarError($errores, $campo) {
            $alerta = '';
            if (isset($errores[$campo]) && !empty($campo)) {
                $alerta = "<div class='alerta alerta-error'>" . $errores[$campo] . "</div>";
            }
            return $alerta;
        }

        public static function clearAll() {
            unset($_SESSION['validation_error']);
            unset($_SESSION['statusRegister']);
            unset($_SESSION['statusUpdate']);
            unset($_SESSION['dataPOST']);
        }
    }

?>