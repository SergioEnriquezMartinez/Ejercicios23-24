<fieldset>           
    <legend> Test de <?=$_POST["nombreUsuario"]?>: Resultados </h4></legend>
        <table>
            <tr><th>Operación</th><th>Num.Correctas/Num.Totales</th><th>Porcentaje</th></tr>
            <tr><td>Sumas</td>
                <td><?=$contSumasCorrectas?>/<?=$_POST["numSumas"]?></td>
                <td><?=number_format($contSumasCorrectas*100/$_POST["numSumas"], 2)?>%</td>
            </tr>
            <tr>
                <td>Restas</td>
                <td><?=$contRestasCorrectas?>/<?=$_POST["numRestas"]?></td>
                <td><?=number_format($contRestasCorrectas*100/$_POST["numRestas"], 2)?>%</td>
            </tr>
        </table>
        
    </fieldset>

    <p><a href='index.php'>Volver a Empezar</a></p>