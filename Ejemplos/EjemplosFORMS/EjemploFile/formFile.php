
<form enctype="multipart/form-data" action="formFile.php"  method="POST">
    <div>Archivo: <input name="archivoEnviado" type="file" /></div>
    <div><input type="submit" name="btnSubir" value="Subir" /></div>
</form>

<?php

    echo "<pre>"; print_r($_FILES); echo "</pre>";

    if (isset($_POST['btnSubir']) && $_POST['btnSubir'] == 'Subir') {
        if (is_uploaded_file($_FILES['archivoEnviado']['tmp_name'])) {
            // subido con éxito

            // if ($_FILES['archivoEnviado']['size']) ...
            // if ($_FILES['archivoEnviado']['type']) ...

            if ($_FILES['archivoEnviado']['type'] != "text/plain"){
                echo "<p>Error, debes seleccionar un fichero de texto</p>";
            }else{
                $nombre = $_FILES['archivoEnviado']['name'];
                move_uploaded_file($_FILES['archivoEnviado']['tmp_name'], "./uploads/{$nombre}");
        
                echo "<p>Archivo $nombre subido con éxito</p>";
            }
            
        }
    }    