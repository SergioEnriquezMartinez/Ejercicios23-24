<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
</head>
<body>
    <?php
        $nombre = $_GET["nombre"];
        $sumas = $_GET["sumas"];
        $restas = $_GET["restas"];
        $sumaTotal = $_GET["sumaTotal"];
        $restaTotal = $_GET["restaTotal"];

        if (empty($nombre) && !preg_match("/^[a-zA-Z ]*$/", $nombre)) {
            echo "<p>Introduce un nombre válido</p>";
        }
        
        if (is_numeric($numSumas) && is_numeric($numRestas)) {
            $numSumas = intval($sumas);
            $numRestas = intval($restas);
            if ($numSumas >= 0 && $numRestas >= 0) {
                $numOperaciones = $numSumas + $numRestas;
            } else {
                echo "<p>Introduce un valor mayor que 0</p>";
            }
        } else {
            echo "<p>Introduce valores numéricos</p>";
        }

        echo "<h3>Test $i/$numOperaciones</h3>";
        $sumaOresta = rand(0,1) > 0.5;

        $operando1 = rand(10, 99);
        $operando2 = rand(10, 99);
        if ($sumaOresta && $contSumas <= $numSumas) {
            $resultadoEsperado = $operando1 + $operando2;
            echo "<h2>¿Cuánto suman $operando1 + $operando2?</h2>";
            echo "<form>";
                echo "<input type=\"number\" name=\sumaTotal\" id=\"sumaTotal\">";
                echo "<input type=\"hidden\" value=\"$resultadoEsperado\">";
                echo "<input type=\"hidden\" value=\"$i\">";
                echo "<input type=\"hidden\" value=\"$numOperaciones\">";
            echo "</form>";
            $contSumas++;
            $i++;
        } else if (!$sumaOresta && $contRestas <= $numRestas) {
            $resultadoEsperado = $operando1 - $operando2;
            echo "<h2>¿Cual es el resultado de $operando1 - $operando2?</h2>";
            echo "<form>";
                echo "<input type=\"number\" name=\"restaTotal\" id=\"restaTotal\">";
                echo "<input type=\"hidden\" value=\"$resultadoEsperado\">";
                echo "<input type=\"hidden\" value=\"$i\">";
                echo "<input type=\"hidden\" value=\"$numOperaciones\">";
            echo "</form>";
            $contRestas++;
            $i++;
        }
        
    ?>
</body>
</html>