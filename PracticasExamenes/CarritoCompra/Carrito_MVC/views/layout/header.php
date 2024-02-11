<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    use Manu\CarritoMvc\Config\Parameters;
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="<?= Parameters::$BASE_URL?>assets/css/style.css" />

</head>
<body>
    <h1>La tienda del Altavoz Humano</h1>
    
    <div id="categorias">
        <?php
        echo "<div id='padreBarra'>";
        foreach ($categorias as  $categoria) {
            echo "<a id='barra'href='".Parameters::$BASE_URL."Entrada/categoria&id=".$categoria["id"]."'>".$categoria["nombre"]."</a>";
            # code...
        }
        if(isset($_SESSION["cart"])){

            echo "<a id='barra' href='".Parameters::$BASE_URL."Cart/mostrar'>Carrito ".count($_SESSION["cart"])."</a>";
        }else{
            echo "<a id='barra' href='".Parameters::$BASE_URL."Cart/mostrar'>Carrito</a>";

        }

        echo "</div>";
        ?>
    </div>
    <div id="vistaPrincipal">
        
    


