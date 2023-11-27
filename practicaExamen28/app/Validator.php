<?php

namespace app;

class Validator
{
    static function validateName($name): bool
    {
        return preg_match("/^[A-ZÁÉÍÓÚÑ][a-záíóúñ]+[ ]*[A-ZÁÉÍÓÚÑ]*[a-záíóúñ]*$/", $name);
    }
    static function positiveInt($number): bool
    {
        return filter_var($number, FILTER_VALIDATE_INT) && $number > 0 ? true : false;
    }

    static function isOdd($number)
    {
        return $number % 2 != 0 ? true : false;
    }
}
