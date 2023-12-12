<?php

    $cantidad = $_GET["cantidad"];
    $suma = 0;
    for ($i=0; $i < $cantidad; $i++) { 
        $suma += $_GET["caja$i"];
    }
    echo "La suma total es: " . $suma;
?>