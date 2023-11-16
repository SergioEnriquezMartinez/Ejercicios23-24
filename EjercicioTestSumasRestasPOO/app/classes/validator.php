<?php
namespace Classes;
class Validator {
    public static function validateName($name):bool{
        $name = strtoupper($name);
        return preg_match("/^[A-Za-zÑñáéíóúÁÉÍÓÚ]+([ ][A-Za-zÑñáéíóúÁÉÍÓÚ]+)*$/", $name);
    }

    public static function validateInt($num): bool{
        return filter_var($num, FILTER_VALIDATE_INT);
    }
    public static function validatePositiveInt($num): bool{
        return Validator::validateInt($num) && $num>=0;
    }
}
