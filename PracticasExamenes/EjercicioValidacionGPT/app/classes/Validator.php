<?php
class Validator
{

    public static function validaNombre($nombre): bool
    {
        return preg_match("/^[a-zA-Z ]+$/", $nombre);
    }

    public static function validarEmail($email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public static function validarContraseñaIguales($pass1, $pass2): bool
    {
        return $pass1 === $pass2;
    }

    public static function validarContraseña($pass): bool
    {
        return preg_match("/^[A-Z+][A-Za-z0-9]{7,15}$/", $pass);
    }

    public static function validarFecha($fecha): bool
    {
        $anioActual = date('Y');
        $fechaSeparada = explode("-", $fecha);
        if ($anioActual >= $fechaSeparada[0] && $fechaSeparada[1] < 13 && $fechaSeparada[1] > 0) {
            switch ($fechaSeparada[1]) {
                case 4:
                case 6:
                case 9:
                case 11:
                    if ($fechaSeparada[2] > 0 && $fechaSeparada[2] < 31);
                    return true;
                    break;
                case 2:
                    if ($fechaSeparada[2] > 0 && $fechaSeparada[2] < 29);
                    return true;
                    break;
                default:
                    if ($fechaSeparada[2] > 0 && $fechaSeparada[2] < 32);
                    return true;
                    break;
            }
            return false;
        }
    }
}
