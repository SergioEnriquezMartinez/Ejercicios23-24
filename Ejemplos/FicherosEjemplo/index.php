<?php
    require_once "src/Files.php";
    /*
    $contenido = Files::leerFichero();
    echo "<p> $contenido </p>";
    */

    for($i=0;$i<10;$i++)
        Files::escribirFichero("Primera linea\n");


    $contenido = Files::leerFicheroPorLineas();
    foreach($contenido as $linea){
        echo "<p>$linea</p>";
    }
    
