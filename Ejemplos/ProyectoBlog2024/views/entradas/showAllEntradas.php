<?php
use Mgj\ProyectoBlog2024\Config\Parameters;

//echo "<pre>"; var_dump($data["entradas"]); echo "</pre>";

$entradas = $data["entradas"]??NULL;
$info = $data["info"]??"Todas las entradas";

if ($entradas == NULL){
    echo "<p> No existen entradas </p>";
}else{
    echo "<h1> $info </h1>";
    foreach($entradas as $entrada){
        echo "<article class='entrada'>";
            echo "<a href='' >";
                echo "<h2>".$entrada["titulo"]."</h2>";
                echo "<span class='fecha'> ".$entrada["nombreCategoria"]." | ".$entrada["fecha"]." </span>";
                echo "<p>".$entrada["descripcion"]."</p>";
            echo "</a>";
        echo "</article>";
    }

    if (isset($data["pagination"])) $data["pagination"]->render();
    echo "<div><a href='".Parameters::$BASE_URL . "Pdf/print" ."' class='boton boton-verde'>Generar PDF</a></div>";
    
}
