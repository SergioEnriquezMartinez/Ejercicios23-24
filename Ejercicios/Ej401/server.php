<!-- 
    Muestra los valores de $_SERVER al ejecutar un script en tu ordenador.
    Prueba a pasarle los parametros por _GET y a no pasarselos.
    Prepara un formulario post.html que haga un envío POST y compruébalo de nuevo.
    Crea una página enlace.html que tenga un enlace a server.php y comprueba el valor de HTTP_REFERER.
-->

<?php
    echo "<pre>";
    print_r($_SERVER);
    echo "</pre>";

    echo "<p>" . $_SERVER['HTTP_REFERER'] . "</p>";
?>