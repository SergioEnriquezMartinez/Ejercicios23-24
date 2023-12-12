<?php
$persona["nombre"] = "Bruce Wayne";
$persona["telefonos"] = ["966 123 456", 
                        "636 636 636"];
// $persona["telefonos"][0] = "966 123 456";
// $persona["telefonos"][1] = "636 636 636";

$persona["profesion"] = ["dia" => "filántropo", 
                        "noche" => "caballero oscuro"]; 

$persona["profesion"]["dia"] = "filántropo";
$persona["profesion"]["noche"] = "caballero oscuro";

/*
echo $persona['nombre'].
    " por la noche trabaja de ".
    $persona['profesion']['noche'] . "<br>";

foreach ($persona["profesion"] as $jornada => $dedicacion){
    echo "<p> $jornada: $dedicacion </p>";
    //var_dump($info) . "<br>";
}*/

$menu1 = ["Plato1" => "Macarrones con queso", 
          "Plato2" => "Pescado asado", 
          "Bebida" => "Coca-Cola", 
          "Postre" => "Helado de vainilla"];

$menu2 = ["Plato1" => "Sopa", 
         "Plato2" => "Lomo con patatas", 
         "Bebida" => "Agua", 
         "Postre" => "Arroz con leche"];
     
$menus = ["lunes" => $menu1, 
          "martes" => $menu2]; 

foreach ($menus as $dia => $menudeldia) {
  echo "Menú del día: <strong>$dia</strong><br/>";
  // echo "<pre>";print_r($menudeldia);"</pre>";
  foreach ($menudeldia as $platos => $comida) {
    echo "$platos: $comida <br/>";
  }
}

// Para acceder a un elemento concreto se anidan los corchetes
$postre0 = $menus["martes"]["Postre"];
echo "<h1> $postre0 </h1>";