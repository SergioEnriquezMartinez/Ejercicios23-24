<?php
    if(isset($_GET["nombre"]) && isset($_GET["altura"]) && isset($_GET["email"])) {
        
        $cantidad = $_GET["cantidad"];
        
        for ($i=0; $i < $cantidad; $i++) {

            $persona["persona$i"] = ["nombre" => $_GET["nombre"], "altura" => $_GET["altura"], "email" => $_GET["email"]];
//            $persona["persona$i"] = [$_GET["nombre"], $_GET["altura"], $_GET["email"]];
        }

    } else {
        echo "<h3>Introduce valores correctos, por favor.</h3>";
    }    
    echo '<table>
            <thead>
                <th>Nombre</th>
                <th>Altura</th>
                <th>Email</th>
            </thead>
            <tbody>';
            
            for ($j=0; $j < $cantidad; $j++) {
                    echo "
                        <td>{$persona["nombre"]}</td>
                        <td>{$persona["altura"]}</td>
                        <td>{$persona["email"]}</td>";
                        /*echo "
                        <td>$persona[0]</td>
                        <td>$persona[1]</td>
                        <td>$persona[2]</td>";*/
                }
        echo '</tbody>
        </table>';

    $personaAlta = null;
    $personaBaja = null;
    foreach ($persona as $personas) {
        if ($personaAlta === null || $personas["altura"] > $personaAlta["altura"]) {
            $personaAlta = $personas;
        }

        if ($personaBaja === null || $personas["altura"] < $personaBaja["altura"]) {
            $personaBaja = $personas;
        }

    }
    echo "Persona más alta: " . $personaAlta["nombre"] . "</br>";
    echo "Persona más baja: " . $personaBaja["nombre"];
?>