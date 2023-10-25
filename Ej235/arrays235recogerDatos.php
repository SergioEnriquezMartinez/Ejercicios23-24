<!--
235alturas.php: Mediante un array asociativo, almacena el nombre y la altura de 5 personas (nombre => altura).
Posteriormente, recorre el array y muéstralo en una tabla HTML. Finalmente añade una última fila a la tabla con la altura media.
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 235</title>
</head>
<body>
    <form action="arrays235mostrarDatos.php" method="get">
        <?php
            for ($i=0; $i < 5; $i++) { 
                echo "<p><label for=\"nombre$i\">Introduce tu nombre</label>
                    <input type=\"text\" name=\"nombre$i\" id=\"nombre$i\">
                    <label for=\"altura$i\">Introduce tu altura</label>
                    <input type=\"text\" name=\"altura$i\" id=\"altura$i\"></p>";
            }
        ?>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>