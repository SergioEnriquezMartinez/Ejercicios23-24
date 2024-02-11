<?php
    use Sergi\ProyectoBlog\Config\Parametros;

    if (isset($datos['entradas'])) {
        $entradas = $datos['entradas'];
    } else {
        header('Location: ' . Parametros::$BASE_URL);
    }

    if (empty($entradas)) {
        echo '<p>No existen entradas</p>';
    } else {
?>
        <h1>Entradas</h1>
        <?php
        foreach($entradas as $entrada) {
            echo '<article class="entrada">';
                echo '<a href="' . Parametros::$BASE_URL . 'Entrada/verEntrada&id=' . $entrada->id . '">';
                    echo '<h2>' . $entrada->titulo . '</h2>';
                    echo '<span class="fecha">' . $entrada->nombreCategoria . ' | ' . $entrada->fecha . '</span>';
                    echo '<p>' . $entrada->descripcion . '</p>';
                echo '</a>';
            echo '</article>';
        }
        ?>
        <div><a href="' . Parametros::$BASE_URL . 'Pdf/print' . '" class="boton boton-azul">Generar PDF</a></div>
<?php
    }
?>