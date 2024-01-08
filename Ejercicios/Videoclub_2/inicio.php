<?php

    include "Soporte.php";
    include "CintaVideo.php";
    include "Dvd.php";
    include "Juego.php";

    //Soporte Pruebas
    $soporte = new Soporte("Tenet", 22, 3);
    echo "<strong>".$soporte->titulo."</strong>";
    echo "<p>Precio: ".$soporte->getPrecio()."</p>";
    echo "<p>Precio IVA incluido: ".$soporte->getPrecioConIva()." euros</p>";
    $soporte->muestraResumen();


    //CintaVideo Pruebas
    $cintaVideo = new CintaVideo("Los Cazafantasmas", 23, 3.5, 107);
    echo "<strong>".$cintaVideo->titulo."</strong>";
    echo "<p>Precio: ".$cintaVideo->getPrecio()."</p>";
    echo "<p>Precio IVA incluido: ".$cintaVideo->getPrecioConIva()." euros</p>";
    $cintaVideo->muestraResumen();

    //Dvd Pruebas
    $dvd = new Dvd("Origen", 24, 15, "es, en, fr", "16:9");
    echo "<strong>".$dvd->titulo."</strong>";
    echo "<p>Precio: ".$dvd->getPrecio()."</p>";
    echo "<p>Precio IVA incluido: ".$dvd->getPrecioConIva()." euros</p>";
    $dvd->muestraResumen();

    //Juego Pruebas
    $juego = new Juego("The Last of Us Part II", 26, 49.99, "PS4", 1, 1);
    echo "<strong>".$juego->titulo."</strong>";
    echo "<p>Precio: ".$juego->getPrecio()."</p>";
    echo "<p>Precio IVA incluido: ".$juego->getPrecioConIva()." euros</p>";
    $juego->muestraResumen();
?>