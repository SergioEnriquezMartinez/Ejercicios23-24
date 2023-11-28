<?php
namespace Classes;

class Validations {
    
    public static function validateNombreCorrecto(string $nombre): bool {
        return preg_match("/^[a-záéíóúA-ZÁÉÍÓÚ]+[a-záéíóúA-ZÁÉÍÓÚ]+[a-záéíóúA-ZÁÉÍÓÚ]*$/", $nombre);
    }

    public static function validatePositiveInt(int $num): bool {
        return (!is_int($num) || $num < 0);
    }

    public static function validateFactura(string $factura):bool {
        return $factura == null;
    }

    public static function validateFacturaPagada(Factura $factura): bool {
        return $factura->getPagada();
    }

    public static function validateRangoInt(int $min, int $max, int $num): bool {
        return ($num >= $min && $num <= $max);
    }

    public static function validateMesCorrecto(int $mes): bool {
        return ($mes >= 1 && $mes <= 12);
    }

    public static function validateNrpFormatoCorrecto(string $rnp): bool {
        return preg_match("/^[0-9]{5}[A-Z]{1}$/", $rnp);
    }

    public static function validateLetraCorrecta(string $rnp): bool {
        $letra = substr($rnp, -1);
        $suma = intval($rnp[0]) + intval($rnp[1]) + intval($rnp[2]) + intval($rnp[3]) + intval($rnp[4]);
        $resto = $suma % 26;
        $abecedario = range('A', 'Z');
        
        if ($suma > 26) {
            if ($letra == $abecedario[$resto]) {
                $isCorrecta = true;
            } else $isCorrecta = false;
        } elseif ($suma <= 26) {
            if ($letra == $abecedario[$suma]) {
                $isCorrecta = true;
            } else $isCorrecta = false;
        }
        return $isCorrecta;
    }

    public static function validateNrpCorrecto(string $rnp): bool {
        return (self::validateNrpFormatoCorrecto($rnp) && self::validateLetraCorrecta($rnp));
    }
}

?>