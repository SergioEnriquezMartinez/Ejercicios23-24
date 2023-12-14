
<form action="recogerDatos.php" method="POST">
    <p><label for="nombre">Nombre del alumno:</label>
        <input type="text" name="nombre" id="nombre" value="" />
    </p>

    <p> Lenguaje principal que utilizas
        <select name="lenguajes">
            <option value=""></option>
            <option value="c">C</option>
            <option value="java">Java</option>
            <option value="php">PHP</option>
            <option value="python">Python</option>
        </select>
    </p>

    <p> ¿Lenguaje? Favorito
        <input type="radio" id="html" name="fav_language" value="HTML">
        <label for="html">HTML</label>
        <input type="radio" id="css" name="fav_language" value="CSS">
        <label for="css">CSS</label>
        <input type="radio" id="javascript" name="fav_language" value="JavaScript">
        <label for="javascript">JavaScript</label> 
    </p>

    <p><input type="checkbox" name="modulos[]" id="modulosDWES" value="DWES" />
        <label for="modulosDWES">Desarrollo web en entorno servidor</label>
    </p>

    <p><input type="checkbox" name="modulos[]" id="modulosDWEC" value="DWEC" />
        <label for="modulosDWEC">Desarrollo web en entorno cliente</label>
    </p>

    <p><input type="checkbox" name="modulos[]" id="modulosP" value="P" />
        <label for="modulosP">Programación</label>
    </p>

    <input type="submit" name="btnAlta" value="Alta Alumno"/>
    <input type="submit" name="btnMod" value="Modificar Alumno"/>
</form>