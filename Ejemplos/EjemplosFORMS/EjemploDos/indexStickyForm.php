<!-- EL sticky form es un formulario que recuerda sus valores-->

<?php
if (!empty($_POST['modulos']) && !empty($_POST['nombre'])) {
    // Aquí se incluye el código a ejecutar cuando los datos son correctos
    echo "<p>   Datos correctos -- continuamos con la app </p>";
} else {
    // Generamos el formulario
    $nombre = $_POST['nombre'] ?? "";
    $modulos = $_POST['modulos'] ?? [];
    $w3review = $_POST['w3review'] ?? "";
    $checkDWES= in_array("DWES", $modulos)?" checked ": ""; //esto explica que si existe el valor DWES dentro del array modulos, devuelve checked.
    $checkDWEC= in_array("DWEC", $modulos)?" checked ": ""; //esto explica que si existe el valor DWEC dentro del array modulos, devuelve checked.
?>
    <form action="indexStickyForm.php" method="POST">
        <p><label for="nombre">Nombre del alumno:</label>
            <input type="text" name="nombre" id="nombre" value="<?=$nombre?>" /> 
        </p>
        <p><input type="checkbox" name="modulos[]" id="modulosDWES" value="DWES" <?=$checkDWES?> />
            <label for="modulosDWES">Desarrollo web en entorno servidor</label>
        </p>
        <p><input type="checkbox" name="modulos[]" id="modulosDWEC" value="DWEC" <?=$checkDWEC?>  />
            <label for="modulosDWEC">Desarrollo web en entorno cliente</label>
        </p>

        <textarea name="w3review" id="w3review" cols="50" rows="4"><?=$w3review?></textarea>
        <!--textArea -->
    <p><input type="submit" value="Enviar" name="enviar" /></p>
    </form>
<?php } /**Esta llave pertence al else */ ?> 