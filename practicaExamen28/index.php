<?php include_once "inc/header.php"; ?>
<fieldset>
    <legend>Rombos</legend>
    <form action="validaForm.php" method="post" id="formulario">
        <p><label for="listaFiguras">Lista Figuras</label>
            <select name="listaFiguras" id="listaFiguras">
                <option value="valorPorDefecto">Escoge una figura</option>
                <option value="cuadrado">Cuadrado</option>
                <option value="triangulo">Triangulo</option>
                <option value="rectangulo">Rectangulo</option>
                <option value="rombo">Rombo</option>
            </select>
        </p>
        <p><label for="nombreUsuario">Nombre Alumn@: </label>
            <input type="text" name="nombreUsuario" id="nombreUsuario" placeholder="Nombre">
        </p>
        <p><input type="number" name="altura" id="altura" class="display" placeholder="Altura" value="no"></p>
        <p><input type="number" name="base" id="base" class="display" placeholder="Base" value="no"></p>
        <p><input type="number" name="cantidadFiguras" id="cantidadFiguras" class="display"></p>
        <p><input type="submit" value="Dibujar"></p>
    </form>
</fieldset>
<?php include_once "inc/footer.php"; ?>