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

        } else if (!$sumaOresta && $contRestas <= $numRestas) {

        }
        
    ?>
</body>
</html>