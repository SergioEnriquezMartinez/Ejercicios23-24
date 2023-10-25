<?php
    $numero1 = $_GET["numero1"];
    $numero2 = $_GET["numero2"];

    if ($numero1 > $numero2) {
        for ($i=$numero1; $i <= $numero2; $i++) {
            echo "<table>                         
                    <thead>
                        <th>a</th>
                        <th>*</th>
                        <th>b</th>
                        <th>=</th>
                        <th>c</th>
                    </thead>
                </table>";
            for ($j=0; $j <= 10; $j++) {
                $result = $i * $j;
                echo "<table>
                        <tbody>
                            <td>$i</td>
                            <td>*</td>
                            <td>$j</td>
                            <td>=</td>
                            <td>$result</td>
                        </tbody>
                    </table>";
            }
        }
    } elseif ($numero2 > $numero1) {
        for ($i=$numero2; $i >= $numero1; $i--) {
            echo "<table>                         
                    <thead>
                        <th>a</th>
                        <th>*</th>
                        <th>b</th>
                        <th>=</th>
                        <th>c</th>
                    </thead>
                </table>";
            for ($j=0; $j <= 10; $j++) {
                $result = $i * $j;
                echo "<table>
                        <tbody>
                            <td>$i</td>
                            <td>*</td>
                            <td>$j</td>
                            <td>=</td>
                            <td>$result</td>
                        </tbody>
                    </table>";
            }
        }
    } else {
        echo "<table>                         
                    <thead>
                        <th>a</th>
                        <th>*</th>
                        <th>b</th>
                        <th>=</th>
                        <th>c</th>
                    </thead>
                </table>";
            for ($j=0; $j <= 10; $j++) {
                $result = $i * $j;
                echo "<table>
                        <tbody>
                            <td>$i</td>
                            <td>*</td>
                            <td>$j</td>
                            <td>=</td>
                            <td>$result</td>
                        </tbody>
                    </table>";
            }
    }
?>