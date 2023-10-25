<?php
    $nombre = $_GET["nombre"];
    $ap1 = $_GET["apellido1"];
    $ap2 = $_GET["apellido2"];
    $email = $_GET["email"];
    $feNa = $_GET["fecNac"];
    $telefono = $_GET["tlf"];

    echo "<table>
        <tr>
            <td>Nombre</td>
            <td>Primer Apellido</td>
            <td>Segundo Apellido</td>
            <td>Email</td>
            <td>Fecha de Nacimiento</td>
            <td>Teléfono</td>
        </tr>
        
        <tr>
            <td>$nombre</td>
            <td>$ap1</td>
            <td>$ap2</td>
            <td>$email</td>
            <td>$feNa</td>
            <td>$telefono</td>
        </tr>
    </table>";
