<?php
$suma = fn (int $num1, int $num2) => $num1 + $num2;
$resta = fn (int $num1, int $num2) => $num1 - $num2;
$producto = fn (int $num1, int $num2) => $num1 * $num2;
$division = fn (int $num1, int $num2) => $num1 / $num2;

function suma (int $num1, int $num2) : int {
    return $num1 + $num2;
}

function resta (int $num1, int $num2) : int {
    return $num1 - $num2;
}

function producto (int $num1, int $num2) : int {
    return $num1 * $num2;
}

function division (int $num1, int $num2) : int {
    if ($num1 == 0 || $num2 == 0) {
        return null;
    } else {
        return $num1 / $num2;
    }
}

?>