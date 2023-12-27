<?php
    include_once "config/database.inc.php";

    try {

        $conexion = new PDO($cadConexion, $usuarioBD, $passwordBD);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Validar los parámetros:
        $email = $_POST["email"];
        $passwd = password_hash($_POST["password"],PASSWORD_DEFAULT);        
        $nombre = $_POST["nombre"];
        $idPais = $_POST["pais"];

        $sql="INSERT INTO pasajero(email, passwd, nombre, idPais) 
                    VALUES (:email, :passwd, :nombre, :idPais)";
        
        $sentencia = $conexion->prepare($sql);        
        $sentencia->bindParam(":email", $email);
        $sentencia->bindParam(":passwd", $passwd);
        $sentencia->bindParam(":nombre", $nombre);
        $sentencia->bindParam(":idPais", $idPais);
        $isOk = $sentencia->execute();
        $idGenerado = $conexion->lastInsertId();

        echo "<p> Todo correcto, id generado: $idGenerado </p>";

    } catch (PDOException $e) {
        echo "<p>Falló la conexión: {$e->getMessage()} </p>";
    }

    echo "<p><a href='formAltaPasajero.php'>Volver al formulario anterior</a></p>";
