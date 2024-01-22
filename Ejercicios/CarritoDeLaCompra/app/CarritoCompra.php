<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/style.css">
</head>

<body>
    <h1>Carrito de la Compra (Productos)</h1>

    <form action="CarritoCompra.php" method="post">
        <p>
            <label for="categorias">Categorias</label>
            <select name="categoria" id="categoria">
                <?php

                session_start();
                include_once "DAO.php";


                use app\DAO;

                $arrayCategorias = DAO::getCategorias();
                $categorias = [];
                for ($i = 0; $i < count($arrayCategorias); $i++) {
                    $categorias[] = $arrayCategorias[$i + 1]->getNombreCategoria();
                    echo "<option value='$categorias[$i]'>$categorias[$i]</option>";
                }
                ?>
            </select>
            <input type="submit" value="Buscar Productos">
        </p>
    </form>
    <?php

    include_once "MostrarProductos.php";
    if (isset($_SESSION['vaciar'])) {
        echo "<p class='error'>Se ha vaciado correctamente el carrito de Compra</p>";
        unset($_SESSION['vaciar']);
    }
    include_once "aniadirACarro.php";
    ?>

    <?php
    if (count($arrayCarrito) > 0) {
        include_once "MostrarCarro.php";
        if (isset($_POST['eliminarNombre'])) {
            include_once "eliminarDelCarro.php";
            include_once "MostrarCarro.php";
        }
    }
    
    ?>
</body>

</html>