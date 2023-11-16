    <?php
        $datosOperacionesCorrectas = $test->numOperacionesCorrectas();
    ?>

    <fieldset>           
    <legend> Test de <?=$test->getNombreUsuario()?>: Resultados </legend>
        <table>
            <tr><th>Operación</th><th>Num.Correctas/Num.Totales</th><th>Porcentaje</th></tr>
            <tr><td>Sumas</td>
                <td><?=$datosOperacionesCorrectas['SUMAS']?>/<?=$test->getNumSumas()?></td>
                <td><?=number_format($datosOperacionesCorrectas['SUMAS']*100/$test->getNumSumas(), 2)?>%</td>
            </tr>
            <tr>
                <td>Restas</td>
                <td><?=$datosOperacionesCorrectas['RESTAS']?>/<?=$test->getNumRestas()?></td>
                <td><?=number_format($datosOperacionesCorrectas['RESTAS']*100/$test->getNumRestas(), 2)?>%</td>
            </tr>
        </table>
        
    </fieldset>

    <p><a href='index.php'>Volver a Empezar</a></p>