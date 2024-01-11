<?php
    namespace app;
    class Validator {

        const MIN_CARACTERES_DIAGNOSTICO = 10;
        const MAX_CARACTERES_DIAGNOSTICO = 255;

        public static function validaFormulario($nombre, $priApe, $edad, $estado, $diagnostico): bool {
            return isset($nombre) && isset($priApe) && isset($edad) && isset($estado) && isset($diagnostico);
        }

        public static function validaNombre($nombre): bool {
            return preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ]+([ ][a-zA-ZáéíóúÁÉÍÓÚñÑ])?$/",$nombre);
        }

        public static function validaApellido($apellido): bool {
            return preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ]+([ -][a-zA-ZáéíóúÁÉÍÓÚñÑ]){0,3}$/",$apellido);
        }

        public static function validaEdad($edad): bool {
            return filter_var($edad, FILTER_VALIDATE_INT) > 0;
        }

        public static function validaDiagnostico($diagnostico): bool {
            return strlen($diagnostico) >= self::MIN_CARACTERES_DIAGNOSTICO && strlen($diagnostico) <= self::MAX_CARACTERES_DIAGNOSTICO;
        } 

    }


?>