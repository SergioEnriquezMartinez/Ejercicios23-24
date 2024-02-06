<?php
    use Sergi\ProyectoBlog\Config\Parametros;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=Parametros::$BASE_URL?>assets/css/stylePDF.css">
    <title>Blog Alonso de Madrigal</title>
</head>
<body>
    <?php
        if (!isset($_SESSION["entradasPDF"])) {
            echo '<p>No hay entradas para mostrar</p>';
        } else {
            echo '<h1>Listado de entradas</h1>';
            echo '<h2>' . $_SESSION["tituloPDF"] . '</h2>';
            echo '<table>';
                echo '<tr>';
                    echo '<th>Titulo</th>';
                    echo '<th>Descripción</th>';
                    echo '<th>Categoría</th>';
                    echo '<th>Fecha</th>';
                echo '</tr>';

                foreach ($_SESSION["entradasPDF"] as $entrada) {
                    echo '<tr>';
                        echo '<td>' . $entrada->titulo . '</td>';
                        echo '<td>' . $entrada->descripcion . '</td>';
                        echo '<td>' . $entrada->nombreCategoria . '</td>';
                        echo '<td>' . $entrada->fecha . '</td>';
                    echo '</tr>';
                }
            echo '</table>';
        }
    ?>
</body>
</html>