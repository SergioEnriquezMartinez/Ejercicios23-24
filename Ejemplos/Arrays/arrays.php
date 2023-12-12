<?php
    // $frutas = array("naranja", "pera", "manzana");
    // $frutas2 = ["naranja", "pera", "manzana"];

    $frutas3 = [];
    $frutas3[0] = "naranja";
    $frutas3[-1] = "melon";
    $frutas3[2] = "manzana"; 
    $frutas3[1] = "pera";    
    $frutas3[] = "platano";
    $frutas3[7] = "uva"; 
    $frutas3[] = "sandia";
    $frutas3["Francia"] = "Paris";

    $tam = count($frutas3);
    
    echo "<pre>";print_r($frutas3);echo "</pre>";
    var_dump($frutas3);
    echo "<p> Tam. del array: $tam </p>";
    /*for ($i=0; $i<count($frutas3); $i++) {
        echo "Elemento $i: $frutas3[$i] <br />";
    }*/


    foreach ($frutas3 as $fruta) {
        echo "<p>$fruta</p>";
    }