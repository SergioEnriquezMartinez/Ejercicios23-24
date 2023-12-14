<?php

echo "<pre>";print_r($_COOKIE); echo "</pre>";

echo "<h1> Accesos </h1>";
$accesosPagina = 0;

if (isset($_COOKIE['accesos'])) { 
    $accesosPagina = $_COOKIE['accesos']; 
}


setcookie('accesos', ++$accesosPagina, time()+3600); 

echo "<p> Numero de accesos a la pagina: $accesosPagina </p>";

?>

<p><a href="crearCookie.php">Volver a cargar</a></p>

