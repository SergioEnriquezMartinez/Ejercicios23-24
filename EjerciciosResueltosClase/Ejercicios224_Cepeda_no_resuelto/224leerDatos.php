

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<?php

 $cantCajas = $_GET['cantidad'];
 $total = 0;
echo"
    <table  border='1px doted black'>
        <tr>";
 for ($i=0; $i < $cantCajas ; $i++) { 
    
    $numAleatorio = random_int(1,9);
    $total += $numAleatorio;
        
    echo"<td>$numAleatorio</td>";

 }
    echo"
        </tr>
    </table>
    ";

    echo"
        <table border='2px solid black'>
            <tr>
                <th>Total</th>
                <td>$total</td>
            </tr>
        </table>
    ";

?>



<a href="224formulario.html">Volver</a>
</body>
</html>