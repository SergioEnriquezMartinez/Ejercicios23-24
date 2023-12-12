<?php
namespace Classes;
use Classes\Operation;

class Generic{
    public static function aleatorio($limIni, $limFinal): int{
        return rand($limIni, $limFinal);
    }

    // Retornará un 1 (SUMA) o un 2 (RESTA)
    public static function chooseOperator($numSumas, $numRestas, &$contSumas, &$contRestas): int{
        $operator =  null;
        if ($contSumas == $numSumas) $operator = Operation::$RESTA;
        if ($contRestas == $numRestas) $operator = Operation::$SUMA;
        if (is_null($operator)) $operator = Generic::aleatorio(1, 2);
        if ($operator == Operation::$SUMA) $contSumas++;
        if ($operator == Operation::$RESTA) $contRestas++;
        return $operator;
    }

         
}
