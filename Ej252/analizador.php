<?php

function analizador($frase) : void {
    $tam = strlen($frase);
    $espacios = 0;
    $longitudPalabra = 0;
    $cantidadPalabras = 0;

    for ($i = 0; $i < $tam; $i++) {
        if (ctype_space($frase[$i]) || $i == $tam - 1) {
            $palabra = substr($frase, $longitudPalabra, $i - $longitudPalabra);
            $cantidadPalabras++;
            $longitudPalabra = $i + 1;
            $espacios++;
            echo "Palabra: " . $palabra . " con el tamaño de " . strlen($palabra). "<br>";
        }
    }

    $letrasTotales = $tam - $espacios;
    echo "<p>Letras totales: " . $letrasTotales . "</p>";
    echo "<p>Palabras totales: " . $cantidadPalabras . "</p>";
}

analizador("Esto es una frase de prueba");
?>