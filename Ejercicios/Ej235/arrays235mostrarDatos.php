<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>235 Mostrar datos</title>
</head>
<body>
    <?php
        $personas = [];
        $suma = 0;

        for ($i=0; $i < 5; $i++) {
            $nombre = $_GET["nombre$i"];
            $altura = $_GET["altura$i"];
            $personas[] = ["nombre" => $nombre, "altura" => $altura]; // Agregar la persona al array
            $suma += $altura;
        }

        $media = $suma / 5;

        echo "<table>
                <thead>
                    <th>Nombre</th>
                    <th>Altura</th>
                </thead>
                <tbody>";

        foreach ($personas as $persona) {
            echo "<tr>
                    <td>{$persona['nombre']}</td>
                    <td>{$persona['altura']}</td>
                </tr>";
        }

        echo "</tbody>
                <tfoot>
                    <tr>
                        <td><strong>Media de Altura: </strong>$media</td>
                    </tr>
                </tfoot>
            </table>";
    ?>
</body>
</html>
