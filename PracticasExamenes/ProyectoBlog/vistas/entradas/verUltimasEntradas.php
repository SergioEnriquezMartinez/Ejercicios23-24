<?php
    use Sergi\ProyectoBlog\Config\Parametros;

    $entradas = $datos['entradas']??NULL;

    if ($entradas == NULL) {
        echo '<p>No existen entradas</p>';
    } else {
        echo '<h1>Últimas entradas</h1>';
        foreach($entradas as $entrada) {
            echo '<article class="entrada">';
                echo '<a href="">';
                    echo '<h2>' . $entrada->titulo . '</h2>';
                    echo '<span class="fecha">' . $entrada->nombreCategoria . ' | ' . $entrada->fecha . '</span>';
                    echo '<p>' . $entrada->descripcion . '</p>';
                echo '</a>';
            echo '</article>';
        }

        echo '<div id="ver-todas"><a href="' . Parametros::$BASE_URL . 'Entrada/all">Ver todas las entradas</a></div>';
    }
?>