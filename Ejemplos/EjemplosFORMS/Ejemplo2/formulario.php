<?php
// echo "<pre>";print_r($_POST);echo "</pre>";

function validarDatos(){
    $errores = array();
    if (empty($_POST['nombre'])) $errores[] = "Nombre obligatorio";
    else{
        if (!preg_match('/^[A-Z]+$/', strtoupper($_POST['nombre']))) $errores[] = "Formato nombre erroneo";
    }    
    if (empty($_POST['edad'])) $errores[] = "Edad obligatoria";
    else{
        if (!filter_var($_POST['edad'], FILTER_VALIDATE_INT)) $errores[] = "Formato edad erroneo";
    }
    
    if (empty($_POST['modulos'])) $errores[] = "Debe elegir un módulo";
    if (!isset($_POST["fav_language"])) $errores[] = "Debe elegir un lenguaje favorito";
    return $errores;
}

// Validación
$errores = validarDatos();
if (empty($errores)){

    // Aquí se incluye el código a ejecutar cuando los datos son correctos
    echo "<h1> Datos Correctos .... continuamos con la App </h1>";

} else {
  // Generamos el formulario
    $nombre = $_POST['nombre'] ?? "";
    $edad = $_POST['edad'] ?? "";
    $modulos = $_POST['modulos'] ?? [];
    $w3review = $_POST['w3review'] ?? "";
    $fav_language = $_POST['fav_language'] ?? "";
    $lenguajes = $_POST['lenguajes'] ?? "";

    $checkDWES = in_array("DWES",$modulos)?" checked ":"";
    $checkDWEC = in_array("DWEC",$modulos)?" checked ":"";
    $checkP = in_array("P",$modulos)?" checked ":"";

    $checkHTML = $checkCSS = $checkJavaScript = "";
    if (isset($_POST['fav_language'])){
        $checkHTML = $_POST['fav_language'] == "HTML" ? "checked":"";
        $checkCSS = $_POST['fav_language'] == "CSS" ? "checked":"";
        $checkJavaScript = $_POST['fav_language'] == "JavaScript" ? "checked":"";
    }

    $selectedC = $selectedJava = $selectedPHP = $selectedPython = "";
    if (isset($_POST['lenguajes'])){
        $selectedC = $_POST['lenguajes'] == "c" ? "selected":"";
        $selectedJava = $_POST['lenguajes'] == "java" ? "selected":"";
        $selectedPHP = $_POST['lenguajes'] == "php" ? "selected":"";
        $selectedPython = $_POST['lenguajes'] == "python" ? "selected":"";
    }
    

  ?>

  <form action="formulario.php" method="POST">
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
        <input type="radio" id="html" name="fav_language" value="HTML" <?=$checkHTML?> >
        <label for="html">HTML</label>
        <input type="radio" id="css" name="fav_language" value="CSS" <?=$checkCSS?>>
        <label for="css">CSS</label>
        <input type="radio" id="javascript" name="fav_language" value="JavaScript" <?=$checkJavaScript?> >
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
        echo "<ul>";
        foreach($errores as $error){
            echo "<li class='error'>$error</li>";
        }
        echo "</ul>";
    } 

?>