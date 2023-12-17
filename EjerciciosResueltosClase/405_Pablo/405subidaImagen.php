<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Subida</title>
</head>

<body>
    <?php
    /*
    // getimagesize
    
    if (exif_imagetype($_FILES['archivo']['tmp_name'])){
        echo "<p> EL FICHERO ES DE TIPO IMAGEN </p>";
    }else{
        echo "<p> EL FICHERO NO ES DE TIPO IMAGEN </p>";
    }*/


    if (isset($_FILES['archivo'])) {
        if (is_uploaded_file($_FILES['archivo']['tmp_name'])) {
            if ($_FILES['archivo']['type'] == "image/jpeg" || $_FILES['archivo']['type'] == "image/png" || $_FILES['archivo']['type'] == "image/gif") {

                
                $nombre = $_FILES['archivo']['name'];

                move_uploaded_file($_FILES['archivo']['tmp_name'], "./uploads/{$nombre}");
                echo "<p>Archivo $nombre subido con éxito</p>";

                if(isset($_POST['anchura']) && isset($_POST['altura']) && filter_var($_POST['anchura'], FILTER_VALIDATE_INT) && filter_var($_POST['altura'], FILTER_VALIDATE_INT)){

                    $anchura = $_POST['anchura'];
                    $altura = $_POST['altura'];
                    echo "<p>Imagen redimensionada a {$anchura}x{$altura}</p>";
       
                    echo "<img src='./uploads/{$nombre}' width='{$anchura}' height='{$altura}' alt='Imagen subida'>";
                }else{
                    echo "<p>La medidas de la imagen no son correctas</p>";
                }
            } else {
                echo "<p>El archivo no es una imagen</p>";
                echo "<a href='405subida.html'>Volver al formulario</a>";
            }
        } else {
            echo "<p>Error en el formulario</p>";
            echo "<a href='405subida.html'>Volver al formulario</a>";
        }
    } else {
        echo "<p>Por favor suba un archivo</p>";
        echo "<a href='405subida.html'>Volver al formulario</a>";
    }
    ?>
</body>

</html>