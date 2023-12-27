<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

     <?php
        $nombre = $_COOKIE["nombre"] ?? "";
        $apellidos = $_COOKIE["apellidos"] ?? "";
        $email = $_COOKIE["email"] ?? "";
        $url = $_COOKIE["url"] ?? "";
        $sexo = $_COOKIE["sexo"] ?? "";
     ?>
    <fieldset>
        <legend>formulario1</legend>

        <form action="409formulario2.php" method="post">
            <p>
                <label for="nombre">nombre: </label>
                <input type="text" name="nombre" id="nombre" value="<?= $nombre ?>">
            </p>
            <p>
                <label for="apellidos">apellidos:</label>
                <input type="text" name="apellidos" id="apellidos" value="<?= $apellidos ?>">
            </p>
            <p>
                <label for="email">email: </label>
                <input type="email" name="email" id="email" value="<?= $email ?>">
            </p>
            <p>
                <label for="URLpagina">URL pagina personal:</label>
                <input type="url" name="URLpagina" id="URLpagina" value="<?= $url ?>"/>
            </p>
            <p>
                <input type="radio" id="masculino" name="sexo" value="masculino"<?php if($sexo == "masculino") echo'checked="checked"'?> />
                <label for="masculino">masculino</label>
            </p>
            <p>
                <input type="radio" id="femenino" name="sexo" value="femenino" <?php if($sexo == "femenino") echo'checked="checked"'?>/>
                <label for="femenino">femenino</label>
            </p>
            <p>
                <input type="submit" name="enviar" id="enviar">
            </p>
        </form>
    </fieldset>
</body>

</html>