<!-- A partir de una frase, devuelve la cantidad de cada una de las vocales, y el total de ellas. -->
<?php

function contarVocales(string $frase) : void {
    $tamanio = strlen($frase);
    $fraseLowerCase = strtolower($frase);
    $contA = 0;
    $contE = 0;
    $contI = 0;
    $contO = 0;
    $contU = 0;
    $vocalesTotal = 0;
    $stringRespuesta = "";

    for ($i = 0; $i < $tamanio; $i++) {
        if ($fraseLowerCase[$i] == 'a') $contA++;
        elseif ($fraseLowerCase[$i] == 'e') $contE++;
        elseif ($fraseLowerCase[$i] == 'i') $contI++;
        elseif ($fraseLowerCase[$i] == 'o') $contO++;
        elseif ($fraseLowerCase[$i] == 'u') $contU++;
    }

    $vocalesTotal = $contA + $contE + $contI + $contO + $contU;
    $stringRespuesta = "Total de vocales: " . $vocalesTotal . "</br>"
        . "Cantidad de A: " . $contA . "</br>"
        . "Cantidad de E: " . $contE . "</br>"
        . "Cantidad de I: " . $contI . "</br>"
        . "Cantidad de O: " . $contO . "</br>"
        . "Cantidad de U: " . $contU . "</br>";
    echo $stringRespuesta;
}
contarVocales("Esta es una frase de prueba");
?>