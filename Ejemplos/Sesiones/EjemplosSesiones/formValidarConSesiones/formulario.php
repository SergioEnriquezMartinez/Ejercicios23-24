<?php
session_start();

// echo "<pre>"; print_r($_SESSION); echo "</pre>";

if (isset($_SESSION["accessError"])){
    echo "<h3 class='error'> Error de Acceso, entra a la App por el formulario </h3>";
    unset($_SESSION["accessError"]);
}

if (isset($_SESSION["info"])){
    echo "<h3 class='info'> {$_SESSION['info']} </h3>";
    unset($_SESSION["info"]);
}

  // Generamos el formulario
    $nombre = $_SESSION["datosFormulario"]['nombre'] ?? "";
    $edad = $_SESSION["datosFormulario"]['edad'] ?? "";
    $lenguajes = $_SESSION["datosFormulario"]['lenguajes'] ?? "";
    $fav_language = $_SESSION["datosFormulario"]['fav_language'] ?? "";
    $modulos = $_SESSION["datosFormulario"]['modulos'] ?? [];
    $w3review = $_SESSION["datosFormulario"]['w3review'] ?? "";

    $selectedC = $lenguajes == "c" ? "selected" : "";
    $selectedJava = $lenguajes == "java" ? "selected" : "";
    $selectedPHP = $lenguajes == "php" ? "selected" : "";
    $selectedPython = $lenguajes == "python" ? "selected" : "";

    $checkHTML = $fav_language == "HTML" ? "checked" : "";
    $checkCSS = $fav_language == "CSS" ? "checked" : "";
    $checkJavaScript = $fav_language == "JavaScript" ? "checked" : "";

    $checkDWES = in_array("DWES",$modulos)?" checked ":"";
    $checkDWEC = in_array("DWEC",$modulos)?" checked ":"";
    $checkP = in_array("P",$modulos)?" checked ":"";
  ?>

  <form action="validar.php" method="POST">
   <p><label for="nombre">Nombre del alumno:</label>
    <input type="text" name="nombre" id="nombre" value="<?=$nombre?>" /> 
   </p>

   <p><label for="edad">Edad:</label>
    <input type="text" name="edad" id="edad" value="<?=$edad?>" /> 
   </p>

   <p> Lenguaje principal que utilizas
        <select name="lenguajes">
            <option value=""></option>
            <option value="c" <?=$selectedC?> >C</option>
            <option value="java" <?=$selectedJava?> >Java</option>
            <option value="php" <?=$selectedPHP?> >PHP</option>
            <option value="python" <?=$selectedPython?> >Python</option>
        </select>
    </p>

    <p> ¿Lenguaje? Favorito
        <input type="radio" id="html" <?=$checkHTML?> name="fav_language" value="HTML">
        <label for="html">HTML</label>
        <input type="radio" id="css" <?=$checkCSS?> name="fav_language" value="CSS">
        <label for="css">CSS</label>
        <input type="radio" id="javascript" <?=$checkJavaScript?> name="fav_language" value="JavaScript">
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
        if (isset($_SESSION["datosFormulario"])){
            unset($_SESSION["datosFormulario"]);
        }

        if (isset($_SESSION["erroresValidacion"])){
            echo "<ul class='error'>";
            foreach($_SESSION["erroresValidacion"] as $error){
                echo "<li class='error'>$error</li>";
            }
            echo "</ul>";    
            unset($_SESSION["erroresValidacion"]);
        }
        
    

?>