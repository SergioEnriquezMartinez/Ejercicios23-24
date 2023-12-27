<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Modificar Pais</title>
</head>
<body>
    <form action="modPais.php" method="post">
        <p><label for="nombre">Nombre del Pais: </label>
        <input type="text" name="nombre" id="nombre"></p>
        <p><label for="poblacion">Nueva Población del Pais: </label>
        <input type="text" name="poblacion" id="poblacion"></p>
        <p><input type="submit" value="Modificar Población Pais"></p>
    </form>
</body>
</html>