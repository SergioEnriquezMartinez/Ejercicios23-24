<?php
    
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['enviar']) && ($_POST['enviar'] == "Enviar")) {
        if((is_uploaded_file($_FILES['fichero']['tmp_name'])) && isset($_POST['ancho']) && isset($_POST['alto'])) {
            if (!$_FILES['fichero']['type'] == "text/plain") {
                echo "<p>Error, debes seleccionar un fichero de texto</p>";
            } else {
                $nombre = $_FILES['fichero']['name'];
                $tmp = $_FILES['fichero']['tmp_name'];
                $size = $_FILES['fichero']['size'];
                $type = $_FILES['fichero']['type'];
                $error = $_FILES['fichero']['error'];
                move_uploaded_file($tmp, "./uploads/{$nombre}");
    
                echo "<p>Fichero subido correctamente</p>";

                $ancho = $_POST['ancho'];
                $alto = $_POST['alto'];
                
                echo "<p>Datos del fichero:</p>";
                echo "<ul>";
                echo "<li>Nombre: {$nombre}</li>";
                echo "<li>Tamaño: {$size}</li>";
                echo "<li>Tipo: {$type}</li>";
                echo "<li>Error: {$error}</li>";
                echo "</ul>";
                echo "<p>Datos de altura y anchura</p>";
                echo "<ul>";
                echo "<li>Ancho: {$ancho}</li>";
                echo "<li>Alto: {$alto}</li>";
                echo "</ul>";
            }
        } else {
            echo "<p>Error, al cargar el fichero</p>";
        }

    } else {
        echo "<p>Error, no se ha enviado el formulario</p>";
    }
?>