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
        $resultadoSuma = intval($_GET["resultadoSuma"]);
        $resultadoResta = intval($_GET["resultadoResta"]);
        $resultadoEsperadoAnterior = intval($_GET["resultadoEsperado"]);
        $i = intval($_GET["i"]);

        if (empty($nombre) || !preg_match("/^[a-zA-Z ]*$/", $nombre)) {
            echo "<p>Introduce un nombre válido</p>";
        }
        
        if (is_numeric($sumas) && is_numeric($restas)) {
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

        if ($resultadoSuma == $resultadoEsperadoAnterior) {
            $sumasCorrectas++;
        } else if ($resultadoResta == $resultadoEsperadoAnterior) {
            $restasCorrectas++;
        }

        echo "<h3>Test $i/$numOperaciones</h3>";
        $sumaOresta = rand(0,1) > 0.5;

        $operando1 = intval(rand(10, 99));
        $operando2 = intval(rand(10, 99));
        if ($sumaOresta && $contSumas <= $numSumas) {
            $resultadoEsperado = $operando1 + $operando2;
            $contSumas++;
            $i++;
            echo "<h2>¿Cuánto suman $operando1 + $operando2?</h2>";
            echo "<formn action=\"test.php\" method=\"get\">";
                echo "<input type=\"number\" name=\"resultadoSuma\" id=\"resultadoSuma\">";
                echo "<input type=\"hidden\" name=\"resultadoEsperado\" value=\"$resultadoEsperado\">";
                echo "<input type=\"hidden\" name=\"i\" value=\"$i\">";
                echo "<input type=\"hidden\" name=\"numOperaciones\" value=\"$numOperaciones\">";
                echo "<input type=\"hidden\" name=\"contSumas\" value=\"$contSumas\">";
            echo "</form>";
        } else if (!$sumaOresta && $contRestas <= $numRestas) {
            $resultadoEsperado = $operando1 - $operando2;
            $contRestas++;
            $i++;
            echo "<h2>¿Cual es el resultado de $operando1 - $operando2?</h2>";
            echo "<form action=\"test.php\" method=\"get\">";
                echo "<input type=\"number\" name=\"resultadoResta\" id=\"resultadoResta\">";
                echo "<input type=\"hidden\" name=\"resultadoEsperado\" value=\"$resultadoEsperado\">";
                echo "<input type=\"hidden\" name=\"i\" value=\"$i\">";
                echo "<input type=\"hidden\" name=\"numOperaciones\" value=\"$numOperaciones\">";
                echo "<input type=\"hidden\" name=\"contRestas\" value=\"$contRestas\">";
            echo "</form>";
        }
        
    ?>
</body>
</html>