//funciones con arrays
print_r($array);
var_dump($array); //vuelca info tanto de arrays como variables
$elem = array_pop($array); //elimina el ultimo elemento de un array y lo guarda en $elem
array_push($array, $elem); // añade un elemento al final que esa en $elem
$boolean = in_array($elem, $array); //busca si elem esta en el array
sort($array); //ordena elementos de un array
//para mas funciones vamos a php.net

$paises = array_keys($capitales); //extrae todas las claves
$sort($paises); //ordena de menor a mayor

unset($capitales["Francia"]); //elimina Francia y su capital
//unset funciona en todo tipo de variables

$copia = $nombre; //al copiar un array al otro, es una copia, no apuntan a la misma referencia en memoria

//Arrays Matrices
$persona["nombre"] = "Bruce wayne";
$persona["telefono"] = ["966 123 456", "636 636 636"];
// o tambien
$persona["telefono"][0] = "123 123 123";
$persona["telefono"][1] = "321 321 321";
$persona["profesion"] = ["dia" => "filantropo", "noche" => "caballero oscuro"]; // la => sirve para asociar una variable a un valor
// o tambien
$persona["profesion"]["dia"] = "filantropo";
$persona["profesion"]["noche"] = "caballero oscuro";

echo $persona["nombre"] . "por la noche trabaja de" . $persona["profesion"]["noche"];