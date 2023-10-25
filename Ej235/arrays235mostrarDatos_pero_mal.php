<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>235 Mostrar datos</title>
</head>
<body>
    <?php
        $nombre;
        $altura;
        $suma = 0;
        

        for ($i=0; $i < 5; $i++) {
            $nombre = $_GET["nombre$i"];
            $altura = $_GET["altura$i"];
            $personas = [$nombre => $altura];
            $suma += $altura;
        }

        $media = $suma / 5;

        echo "<table>
                <thead>
                    <th>Nombre</th>
                    <th>------></th>
                    <th>Altura</th>
                </thead>
            </table>";

        foreach ($personas as $nombre => $altura) {
            echo "<table>
                    <tbody>
                        <td>$nombre</td>
                        <td>------></td>
                        <td>$altura</td>
                    </tbody>
                    <tfoot>
                        $media
                    </tfoot>
                </table>";
        }
    ?>
</body>
</html>