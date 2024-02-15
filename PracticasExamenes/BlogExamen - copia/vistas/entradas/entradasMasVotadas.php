<?php
    use Sergi\ProyectoBlog\Config\Parametros;

    $entradas = $datos['entradas']??NULL;
    $_SESSION['entradasPDF'] = $entradas;
    

    if ($entradas == NULL) {
        echo '<p>No existen entradas</p>';
    } else {
        echo '<h1>Entradas más votadas</h1>';
        foreach($entradas as $entrada) {
            echo '<article class="entrada">';
                echo '<a href="' . Parametros::$BASE_URL . 'Entrada/verEntrada&id=' . $entrada->id . '">';
                    echo '<h2>[TOTAL VOTOS: ' . $entrada->conteo . '] ' . $entrada->titulo . '</h2>';
                    echo '<span class="fecha">' . $entrada->nombreCategoria . ' | ' . $entrada->fecha . '</span>';
                    echo '<p>' . $entrada->descripcion . '</p>';
                echo '</a>';
            echo '</article>';
        }

        echo '<div><a href="' . Parametros::$BASE_URL . 'Pdf/print' . '" class="boton boton-azul">Generar PDF</a></div>';
    }
?>