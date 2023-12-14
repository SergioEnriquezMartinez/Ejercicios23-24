<?php
    
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['enviar']) && ($_POST['enviar'] == "Enviar")) {
        if((is_uploaded_file($_FILES['imagen']['tmp_name'])) && isset($_POST['ancho']) && isset($_POST['alto'])) {
            if (!$_FILES['imagen']['type'] == "image/png" || !$_FILES['imagen']['type'] == "image/jpeg" || !$_FILES['imagen']['type'] == "image/gif" || !$_FILES['imagen']['type'] == "image/bmp") {
                echo "<p>Error, debes seleccionar un imagen</p>";
            } else {
                $nombre = $_FILES['imagen']['name'];
                $tmp = $_FILES['imagen']['tmp_name'];
                $size = $_FILES['imagen']['size'];
                $type = $_FILES['imagen']['type'];
                $error = $_FILES['imagen']['error'];
                move_uploaded_file($tmp, "./uploads/{$nombre}");
    
                echo "<p>imagen subido correctamente</p>";

                $ancho = $_POST['ancho'];
                $alto = $_POST['alto'];
                
                echo "<p>Datos del imagen:</p>";
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
            echo "<p>Error, al cargar el imagen</p>";
        }

    } else {
        echo "<p>Error, no se ha enviado el formulario</p>";
    }
?>