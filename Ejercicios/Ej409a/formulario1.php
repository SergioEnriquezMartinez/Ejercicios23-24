<!--
    envía los datos (nombre y apellidos, email, url y sexo) a 409formulario2.php
-->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 409</title>
</head>
<body>
    <main>
        <h1>Introduzca sus datos a continuación</h1>
        <form action="formulario2.php" method="post">
            <p>
                <label for="nombre">Nombre y apellidos</label>
                <input type="text" name="nombre" id="nombre" required>
            </p>
            <p>
                <label for="email">Correo electrónico</label>
                <input type="email" name="email" id="email" required>
            </p>
            <p>
                <label for="urlPag">URL de tu página personal:</label>
                <input type="url" name="urlPag" id="urlPag" required>
            </p>
            <p>
                <label for="sexo">Sexo</label>
                <input type="radio" name="sexo" id="sexo" value="hombre" required>Hombre
                <input type="radio" name="sexo" id="sexo" value="mujer" required>Mujer
            </p>
            <p>
                <input type="submit" value="Enviar">
            </p>
        </form>
    </main>
</body>
</html>