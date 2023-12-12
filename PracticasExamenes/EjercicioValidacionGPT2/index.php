<?php
    include_once "inc/header.php";
?>

    <form action="validaForm.php" method="get">
        <p>
            <label for="nombre">Introduce tu nombre</label>
            <input type="text" name="nombre" id="nombre" required>
        </p>
        <p>
            <label for="email">Introduce tu email</label>
            <input type="email" name="email" id="email" required>
        </p>
        <p>
            <label for="pass1">Introduce tu contraseña</label>
            <input type="password" name="pass1" id="pass1">
        </p>
        <p>
            <label for="pass2">Confirma tu contraseña</label>
            <input type="password" name="pass2" id="pass2">
        </p>
        <p>
            <label for="fecha">Introduce tu fecha de nacimiento</label>
            <input type="date" name="fecha" id="fecha">
        </p>
        <p>
            <label for="telf">Introduce tu número de teléfono</label>
            <input type="tel" name="telf" id="telf">
        </p>
        <p>
            <label for="cp">Introduce tu codigo postal</label>
            <input type="number" name="cp" id="cp">
        </p>
        <p>
            <label for="genero">Introduce la opción que te identifique</label>
            <select name="opciones" id="opciones">
                <option value="h">Hombre</option>
                <option value="m">Mujer</option>
                <option value="nb">No binario</option>
            </select>
        </p>
        <p>
            <input type="submit" value="Enviar">
        </p>
    </form>