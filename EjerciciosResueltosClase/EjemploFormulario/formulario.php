<?php
// echo "<pre>";print_r($_POST);echo "</pre>";

function validarDatos(){
    if (empty($_POST['nombre'])) return false;
    if (empty($_POST['modulos'])) return false;
    // if (preg_match('/^[A-ZÑÁÉÍÓÚ]+$/', strtoupper($_POST['nombre']))) return false;
    
    return true;
}

// Validación
if (validarDatos()){

    // Aquí se incluye el código a ejecutar cuando los datos son correctos
    echo "<h1> Datos Correctos .... continuamos con la App </h1>";

} else {
  // Generamos el formulario
    $nombre = $_POST['nombre'] ?? "";
    $modulos = $_POST['modulos'] ?? [];
    $w3review = $_POST['w3review'] ?? "";
    
    $checkDWES = in_array("DWES",$modulos)?" checked ":"";
    $checkDWEC = in_array("DWEC",$modulos)?" checked ":"";
    $checkP = in_array("P",$modulos)?" checked ":"";
  ?>

  <form action="formulario.php" method="POST">
   <p><label for="nombre">Nombre del alumno:</label>
    <input type="text" name="nombre" id="nombre" value="<?=$nombre?>" /> 
   </p>
   <p><label for="edad">Edad:</label>
    <input type="text" name="edad" id="edad" value="" /> 
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

   <p><input type="checkbox" name="modulos[]" 
            id="modulosDWES" value="DWES" <?=$checkDWES?> />
            <label for="modulosDWES">Desarrollo web en entorno servidor</label>
   </p>
   <p><input type="checkbox" name="modulos[]" 
            id="modulosDWEC" value="DWEC" <?=$checkDWEC?> />    
            <label for="modulosDWEC">Desarrollo web en entorno cliente</label>
   </p>
   <p><input type="checkbox" name="modulos[]" 
            id="modulosP" value="P" <?=$checkP?> />    
            <label for="modulosP">Programación</label>
   </p>
        <label for="w3review">Review of W3Schools:</label>
        <p>
            <textarea id="w3review" name="w3review" rows="4" cols="50"><?=$w3review?></textarea> 
        </p>
        
        <input type="submit" value="Enviar" name="enviar"/>
  </form>

<?php 

    } 

?>