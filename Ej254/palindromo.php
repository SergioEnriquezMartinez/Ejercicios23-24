<!--  Escribe una función que devuelva un booleano indicando si una palabra es palíndroma
(se lee igual de izquierda a derecha que de derecha a izquierda, por ejemplo, “ligar es ser agil”). -->
<?php
    function palindromo($frase) : bool {
        $fraseSinEspacios = str_replace(" ", "", $frase);
        $fraseFinal = strtolower($fraseSinEspacios);
        $fraseFinalInversa = strrev($fraseFinal);

        if ($fraseFinal == $fraseFinalInversa) {
            echo "<p>Si lo es</p>";
            return true;
        } else {
            echo "<p>No lo es</p>";
            return false;
        }
    }

    palindromo("hola");
?>