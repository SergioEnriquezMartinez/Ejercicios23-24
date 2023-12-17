<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>401 post</title>
</head>
<body>
    <form action="401server.php" method="post">
        <p>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" />
        </p>
        <p>
            <label for="edad">Edad:</label>
            <input type="number" name="edad" id="edad" />
        </p>
        <p>
            <input type="submit" value="Enviar" />
        </p>
    </form>
</body>
</html>