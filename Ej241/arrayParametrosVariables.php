<!--
241parametrosVariables.php: Crea las siguientes funciones:
Una función que devuelva el mayor de todos los números recibidos como parámetros: function mayor(): int. Utiliza las funciones func_get_args(), etc... No puedes usar la función max().
Una función que concatene todos los parámetros recibidos separándolos con un espacio: function concatenar(...$palabras) : string. Utiliza el operador ....
-->
<?php
function mayor(): int {
    $mayor = 0;
    $parametros = func_get_args();
    foreach ($parametros as $num) {
        if ($num > $mayor) {
            $mayor = $num;
        }
    }
    return $mayor;
}

echo "El numero mayor de los siguientes es: " . mayor(5, 6, 3, 9, 17, 745, 1);




?>