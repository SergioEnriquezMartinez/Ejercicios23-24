<?php
    include_once "config/database.inc.php";

    try {

        $conn = new PDO($cadConexion, $usuarioBD, $passwordBD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        echo "<p> Conectado a la BD </p>";

    } catch (PDOException $e) {
        echo "<p>Falló la conexión: {$e->getMessage()} </p>";
    }

