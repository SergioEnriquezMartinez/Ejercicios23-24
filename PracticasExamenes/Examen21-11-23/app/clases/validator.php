<?php
    namespace examen;
    class Validator {
    
        public static function validarNombre($nombre) : bool {
            return preg_match("/^[A-ZÁÉÍÓÚ][a-z ]+$/",$nombre);
        }

        public static function validarAltura($altura) : bool {
            return ($altura % 2 != 0 && $altura > 0);
        }

        public static function validarNumRombos($numRombos) : bool {
            return ($numRombos > 0 && $numRombos < 7);
        }

        public static function validarEnteros($entero) : bool {
            return filter_var($entero,FILTER_VALIDATE_INT);
        }
    }
?>