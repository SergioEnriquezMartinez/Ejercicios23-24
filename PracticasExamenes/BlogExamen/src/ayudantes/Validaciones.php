<?php
    namespace Sergi\ProyectoBlog\Ayudantes;

use Sergi\ProyectoBlog\Config\Parametros;

    class Validaciones {
        public static function validarPalabraRegistro($palabra) : bool {
            return (!empty($palabra) && preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ]+([ ][a-zA-ZáéíóúÁÉÍÓÚñÑ])?$/",$palabra));
        }

        public static function validarEmailRegistro($email) : bool {
            return (!empty($email)) && filter_var($email, FILTER_VALIDATE_EMAIL);
        }

        public static function validarPassword($password) : bool{
            return (!empty($password) && strlen($password) >= Parametros::$PASSWORD_MIN_LENGTH) && (preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]$/", $password));
        }
    }
?>