<!-- Crea un programa que permita al usuario leer un conjunto de números separados por espacios.
256filtrado.php: El programa filtrará los números leídos para volver a mostrar únicamente los números pares e indicará la cantidad existente. -->
<?php

if (isset($_GET["numeros"]) && !empty($_GET["numeros"])) {
    
    $lista = $_GET["numeros"];
    $arraySoloNumeros = preg_replace("/\D+/", " ", $lista);
    $arrayNumeros = explode(' ', trim($arrayNumeros));

    $tam = count($arrayNumeros);

    if ($tam > 1) {
        for ($i = 0; $i < $tam; $i++) {
            if ($arrayNumeros[$i] % 2 == 0) {
                $arrayPares [] = $arrayNumeros[$i];
            }
        }
        
        if (count($arrayPares) >= 1) {
            echo "Los " . count($arrayPares) . " numeros pares son: ";

            for ($i = 0; $i < count($arrayPares); $i++) {
                echo $arrayPares[$i];
            }
        } else echo "No hay ningun número par";
    } else echo "No hay ningun número en los valores enviados";
} else {
    echo "<p>No ha introducido ningún número</p>";
    echo "<p><a href=\"filtrado.html\"></a></p>";
}
?>