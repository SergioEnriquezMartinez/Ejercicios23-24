<?php
namespace app;
//session_start();
    if (isset($_POST['categoria'])) {

        $_SESSION['categoria'] = $_POST['categoria'];
    }
    if (isset($_POST['categoria']) || isset($_SESSION['categoria'])) {
        $categorias = DAO::getCategorias();
        foreach ($categorias as  $value) {
            if ($value->getNombreCategoria() == $_SESSION['categoria']) {
                $id = $value->getId();
            }
        }
        $productosPorCat = DAO::getProductosCategoria($id);
        /* echo "<pre>";
        print_r($productosPorCat);
        echo "</pre>";*/
        echo '<table border="1">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Producto</th>';
        echo '<th>Descripcion</th>';
        echo '<th>Precio (sin IVA)</th>';
        echo '<th>Unidades</th>';
        echo '<th>Añadir a carrito</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        foreach ($productosPorCat as $producto) {

            echo '<tr>';
            echo '<td>' . $producto->getNombreProducto() . '</td>';
            echo '<td>' . $producto->getDescripcion() . '</td>';
            echo '<td>' . $producto->getPrecio() . '</td>';
            echo '<td>';
            echo '<form action="CarritoCompra.php" method="post">';
            echo '<input type="number" name="cantidad" id="cantidadPro' . $producto->getId() . '">';
            echo '</td>';
            echo '<td>';
            echo '<input type="submit" value="add Carrito" id="' . $producto->getId() . '">';
            echo '<input type="hidden" name="productoId" value="' . $producto->getNombreProducto() . '">';
            //echo '<input type="hidden" name="productoId" value="' . $producto->getId() . '">';
            echo '</form>';
            echo '</td>';
            echo '</tr>';
        }
    }

    echo '</tbody>';
    echo '</table>';
    
    
    ?>
