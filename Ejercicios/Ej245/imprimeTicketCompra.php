<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej245</title>
</head>
<body>
    <?php
    
    require_once 'preparaTicketCompra.php';
    
    $cambioPesetas = fn (int $num) => intval($num * 166.386);
    $euros = 0;
    $pesetas = 0;

    echo "<table>
        <tr>
            <td>Nombre producto</td>
            <td>Valor Euros</td>
            <td>Valor Pesetas</td>
        </tr>";
    foreach ($productos as $nprod => $precio) {
        echo "<tr>
            <td>$nprod</td>
            <td>$precio</td>";
        echo "<td>" . $cambioPesetas($precio) . " </td>
            </tr>";
        $euros += $precio;
        $pesetas += $cambioPesetas($precio);
    }
    echo "<td>Precio total en euros: $euros</td>
        <td>Precio total en pesetas: $pesetas</td>
    </table>";
    ?>
</body>
</html>