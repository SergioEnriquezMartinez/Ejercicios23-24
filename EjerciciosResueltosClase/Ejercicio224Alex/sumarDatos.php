<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SumarDatos</title>
</head>

<body>
    <?php
    $cantidad = $_GET["cantidad"];
    $sumaTotal = 0;
    for ($i = 1; $i <= $cantidad; $i++) {
        $sumaTotal += $_GET["caja$i"];
    }
    echo "La suma total es " . $sumaTotal;
    
    ?>
</body>

</html>