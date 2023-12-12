<!-- Crea las siguientes funciones:

Una función que averigüe si un número es par: esPar(int $num): bool
Una función que devuelva un array de tamaño $tam con números aleatorios comprendido entre $min y $max : arrayAleatorio(int $tam, int $min, int $max) : array
Una función que reciba un $array por referencia y devuelva la cantidad de números pares que hay almacenados: arrayPares(array &$array): int -->

<?php
    function esPar(int $num) : bool {
        if ($num % 2 == 0) {
            return true;
        } else {
            return false;
        }
    }
    
    function arrayAleatorio(int $tam, int $min, int $max) : array {
        $array[] = null;
        for ($i = 0; $i < $tam; $i++) {
            $array[$i] = rand($min, $max);
        }
        return $array;
    }

    function arrayPares(array &$array) : int {
        foreach ($array as $value) {
            if($value % 2 == 0) {
                return $value;
            }
        }
    }
?>