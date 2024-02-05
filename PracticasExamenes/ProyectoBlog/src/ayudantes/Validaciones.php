<?php
    namespace Sergi\ProyectoBlog\Ayudantes;

    class Validaciones {
        public static function validarPalabraRegistro($palabra) {
            return preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ]+([ ][a-zA-ZáéíóúÁÉÍÓÚñÑ])?$/",$palabra);
        }

        public static function validarEmailRegistro($email) {
            return filter_var($email, FILTER_VALIDATE_EMAIL);
        }

        public static function validarPassword($password) {
            return true;
        }

        public static function validarFormulario($nombre, $apellidos, $email, $password, $password2) {
            return self::validarPalabraRegistro($nombre) && self::validarPalabraRegistro($apellidos) && self::validarEmailRegistro($email) && self::validarPassword($password) && $password == $password2;
        }
    }
?>