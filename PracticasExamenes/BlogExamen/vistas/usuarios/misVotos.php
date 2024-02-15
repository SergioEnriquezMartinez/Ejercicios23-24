<?php
    use Sergi\ProyectoBlog\Config\Parametros;

    $votos = $datos['votos']??NULL;
    $usuario = $_SESSION['user']??NULL;

    if ($votos == NULL) {
        echo '<p>No existen votos</p>';
    } else {
        echo '<h1>Mis votos</h1>';
        foreach($votos as $voto) {
            echo '<article class="entrada">';
                echo '<a href="' . Parametros::$BASE_URL . 'Entrada/verEntrada&id=' . $voto->idEntrada . '">';
                    echo '<h2>' . $voto->titulo . '</h2>';
                    echo '<span class="fecha">' . $voto->nombreCategoria . ' | ' . $voto->fecha . '</span>';
                    echo '<p>' . $voto->descripcion . '</p>';
                echo '</a>';
            echo '</article>';
            echo '<a href="' . Parametros::$BASE_URL . 'Entrada/eliminarVotoEntrada&id=' . $voto->idEntrada . '" class="boton boton-rojo">Eliminar voto</a>';
        }


    }
?>