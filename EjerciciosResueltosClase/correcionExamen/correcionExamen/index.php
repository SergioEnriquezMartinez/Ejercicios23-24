<?php
require_once "autoload.php";

use classes\Cliente;
use classes\Factura;
use classes\Generics;
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen Facturas</title>
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <?php
    try {
        $factura = new Factura("Clases de dibujo", 30, 10); //clonar el objeto para no trabajar con el mismo
        $facturaClonada = clone ($factura);
        $clienteJuan = new Cliente("Juan Lopez", "12345F");
        $facturaClonada = clone ($factura);
        $clienteTeresa = new Cliente("Teresa Aragon", "12345C");
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    ?>
</body>

</html>