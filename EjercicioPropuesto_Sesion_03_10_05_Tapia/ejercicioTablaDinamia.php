<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tablaphp.css">
    <title>ejercicioTablaDinamica</title>
</head>

<body>
    <?php
    const LIMITE_BAJO = 2;
    const LIMITE_ALTO = 11;

    function mostrarError($mensaje){
        echo "<h3 class='error'>$mensaje</h3>";
        echo "<p><a href='ejercicioTablaDinamia.html'>Acceso</a></p>";
    }

    if (isset($_POST["filas"]) && 
            isset($_POST["columnas"])) {

        $filas = $_POST["filas"];
        $columnas = $_POST["columnas"];

        if ($filas > LIMITE_BAJO 
                && $filas < LIMITE_ALTO 
                && $columnas > LIMITE_BAJO 
                && $columnas < LIMITE_ALTO) {
            echo "<table>";
            for ($i = 1; $i <= $filas; $i++) {
                echo "<tr>";
                    for ($j=1; $j <= $columnas ; $j++) {
                        $contenido = rand(1,100);
                        if ($contenido % 3 == 0 || $contenido % 5 == 0) {
                            $contenido = "X";
                            echo "<td class=\"rojo\"> $contenido </td>";
                        }else{
                            echo "<td class=\"verde\"> $contenido </td>";
                        }
                    }
                echo "</tr>";
            }
            echo "</table>";
        }else{
            mostrarError("Error en los parámetros proporcionados.");        }
    }else{
        mostrarError("Error, acceso prohibido.");
    }
    ?>
</body>

</html>