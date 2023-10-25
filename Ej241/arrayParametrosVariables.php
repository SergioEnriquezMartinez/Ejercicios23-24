<!--
241parametrosVariables.php: Crea las siguientes funciones:
Una función que devuelva el mayor de todos los números recibidos como parámetros: function mayor(): int. Utiliza las funciones func_get_args(), etc... No puedes usar la función max().
Una función que concatene todos los parámetros recibidos separándolos con un espacio: function concatenar(...$palabras) : string. Utiliza el operador ....
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parámetros Variables</title>
</head>
<body>
    <?php
        function mayor() : int {
            if (func_get_args() == 0 ) {
                return 0;
            } else {
                $mayor = 0;
                $menor = PHP_INT_MAX;
            }
        }
    ?>
</body>
</html>