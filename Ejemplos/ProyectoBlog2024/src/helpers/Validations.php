<?php
	namespace Mgj\ProyectoBlog2024\Helpers;
    use Mgj\ProyectoBlog2024\Config\Parameters;
	class Validations{

        public static function validateName($nombre):bool{
            return (!empty($nombre) && preg_match("/^[a-zñáéíóú]+([ ][a-zñáéíóú]+)*$/", strtolower($nombre)));
        }

        public static function validateEmail($email):bool{
            return (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL));
        }

        public static function validateFormatPassword($password):bool{
            return (!empty($password) && strlen($password) >= Parameters::$PASSWORD_MIN_LENGTH);
        }
    }