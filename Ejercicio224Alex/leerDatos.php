<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica04</title>
</head>

<body>
    <?php
    $cantidad = $_GET["cantidad"];
    ?>
    <form action="sumarDatos.php" method="get">
        <?php 
        for ($i = 1; $i <= $cantidad; $i++) {
            echo "<input type='text' name=\"caja$i\" id=\"caja$i\">";
        }
        echo "<input type=\"hidden\" name=\"cantidad\" value=\"$cantidad\">";
        ?>
        <p><input type="submit" value="Enviar"></p>
    </form>

</body>

</html>