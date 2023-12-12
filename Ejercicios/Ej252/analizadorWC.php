<!-- A partir de una frase con palabras sólo separadas por espacios, devolver

Letras totales y cantidad de palabras
Una línea por cada palabra indicando su tamaño
Nota: no se puede usar str_word_count
252analizadorWC.php: Investiga que hace la función str_word_count, y vuelve a hacer el ejercicio. -->

<?php

    function analizadorWC($frase) : void {
        $arrayFrase = str_word_count($frase);
        $cantidadLetras = 0;
        
        foreach ($arrayFrase as $palabra) {
            $cantidadLetras += strlen($palabra);
            echo "Palabra: " . $palabra . " de tamaño " . strlen($palabra) .  "<br>";
        }
        echo "Cantidad de letras " . $cantidadLetras . "<br>";
        echo "Cantidad de palabras " . count($arrayFrase);
    }

    analizadorWC("Esto es una prueba")
?>