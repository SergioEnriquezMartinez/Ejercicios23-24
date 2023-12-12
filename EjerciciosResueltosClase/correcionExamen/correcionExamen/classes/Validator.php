<?php

namespace classes;

class Validator
{
    public static function validateFLoat($num): bool
    {
        return filter_var($num, FILTER_VALIDATE_FLOAT);
    }

    public static function validatePositiveFloat($num): bool
    {
        return Validator::validateFLoat($num) && $num > 0;
    }
}
