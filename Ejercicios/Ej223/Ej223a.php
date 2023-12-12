<?php
    $numero = $_GET["numero"];

    echo "<table>
            <thead>
                <th>a</th>
                <th>*</th>
                <th>b</th>
                <th>=</th>
                <th>c</th>
                </thead>
        </table>";
    for ($i=0; $i <= 10; $i++) {    //La primera parte es la de declaracion de variables, la segunda la de comparacion y la tercera la de incremento
                                    //En la declaracion y el incremento podemos añadir mas cosas com echo o print
        $result = $numero * $i;
       echo "<table>
                <tbody>
                    <td>$numero</td>
                    <td>*</td>
                    <td>$i</td>
                    <td>=</td>
                    <td>$result</td>
                </tbody>
            </table>";
    }
?>