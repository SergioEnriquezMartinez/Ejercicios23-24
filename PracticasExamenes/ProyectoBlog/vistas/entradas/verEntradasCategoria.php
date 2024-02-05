<?php
    use Sergi\ProyectoBlog\Config\Parametros;

    $entradas = $datos['entradas']??NULL;
    $categoria = $datos['categoria']??NULL;

    if ($entradas == NULL) {
        echo '<p>No existen entradas</p>';
    } else {
        echo '<h1>Entradas de: ' . $categoria->nombre . '</h1>';
        foreach($entradas as $entrada) {
            echo '<article class="entrada">';
                echo '<a href="">';
                    echo '<h2>' . $entrada->titulo . '</h2>';
                    echo '<span class="fecha">' . $entrada->nombreCategoria . ' | ' . $entrada->fecha . '</span>';
                    echo '<p>' . $entrada->descripcion . '</p>';
                echo '</a>';
            echo '</article>';
        }

        echo '<div><a href="' . Parametros::$BASE_URL . 'Pdf/print' . '" class="boton boton-verde">Generar PDF</a></div>';
    }
?>