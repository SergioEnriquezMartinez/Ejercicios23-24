<?php
use Mgj\ProyectoBlog2024\Config\Parameters;

//echo "<pre>"; var_dump($data["entradas"]); echo "</pre>";

$entradas = $data["entradas"]??NULL;
$categoria = $data["categoria"]??NULL;

if ($entradas == NULL){
    echo "<p> No existen entradas </p>";
}else{
    echo "<h1> Entradas de: ".$categoria->nombre."</h1>";

    foreach($entradas as $entrada){
        echo "<article class='entrada'>";
            echo "<a href='' >";
                echo "<h2>".$entrada["titulo"]."</h2>";
                echo "<span class='fecha'> ".$entrada["nombreCategoria"]." | ".$entrada["fecha"]." </span>";
                echo "<p>".$entrada["descripcion"]."</p>";
            echo "</a>";
        echo "</article>";
    }
}
