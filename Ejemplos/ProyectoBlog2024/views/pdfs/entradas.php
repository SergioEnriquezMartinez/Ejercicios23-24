<?php
	use Mgj\ProyectoBlog2024\Config\Parameters;
?>
<!DOCTYPE HTML>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<title>Blog Alonso de Madrigal</title>
		<link rel="stylesheet" type="text/css" href="<?=Parameters::$BASE_URL?>assets/css/stylePdf.css" />
	</head>
	<body>

<?php
    if (!isset($_SESSION["entradasPDF"])){
        echo "<p> No existen entradas </p>";
    }else{
        echo "<h1> Listado de Entradas </h1>";
        echo "<h2> {$_SESSION["tituloPDF"]} </h2>";
        echo "<table>
                <tr>
                    <th>Título</th>
                    <th> Descripción </th>
                    <th> Categoría </th>
                    <th> Fecha </th>
                </tr>";

        foreach($_SESSION["entradasPDF"] as $entrada){
            echo "<tr>
                     <td> {$entrada['titulo']} </td>
                     <td> {$entrada['descripcion']} </td>
                     <td> {$entrada['nombreCategoria']} </td>
                     <td> {$entrada['fecha']} </td>
                  </tr>";
        }

        echo "</table>";
    }
?>

</body>
</html>