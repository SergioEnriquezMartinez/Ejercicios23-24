<?php
    
    
    $usuario = $datos['usuario'];

    echo '<form>';
        echo 'label for="nombre">Nombre</label>';
        echo '<input type="text" id="nombre" name="nombre" value="' . $usuario->nombre . '">';
        
        echo 'label for="apellidos">Apellidos</label>';
        echo '<input type="text" id="apellidos" name="apellidos" value="' . $usuario->apellidos . '">';

        echo 'label for="email">Email</label>';
        echo '<input type="email" id="email" name="email" value="' . $usuario->email . '" disabled>';

        echo 'label for="password">Contraseña</label>';
        echo '<input type="password" id="password" name="password">';

        echo 'label for="password2">Repetir contraseña</label>';
        echo '<input type="password" id="password2" name="password2">';

        echo '<input type="submit" value="Actualizar" name="btnActualizar">';
?>