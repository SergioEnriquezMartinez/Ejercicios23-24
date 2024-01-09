<?php

    include_once "autoload.php";
    use Clases\Videoclub;
    use Clases\Excepciones\ClienteNoEncontradoException;
    use Clases\Excepciones\SoporteNoEncontradoException;
    use Clases\Excepciones\CupoSuperadoException;
    use Clases\Excepciones\SoporteYaAlquiladoException;
    use Clases\Excepciones\VideoclubException;

    try{   
        $vc = new Videoclub(("Severo 8A"));
        
        $vc->incluirJuego("God of War", 1, 19.99, "PS4", 1, 1);
        $vc->incluirJuego("The Last of Us Part II", 2, 49.99, "PS4", 1, 1);
        $vc->incluirDvd("Torrente", 3, 4.5, "es", "16:9");
        $vc->incluirDvd("Origen", 4, 4.5, "es,en,fr", "16:9");
        $vc->incluirDvd("El Imperio Contrataca", 5, 3, "es,en", "16:9");
        $vc->incluirCintaVideo("Los Cazafantasmas", 6, 3.5, 107);
        $vc->incluirCintaVideo("El nombre de la rosa", 7, 1.5, 140);
        
        $vc->listarProductos();
        
        $vc->incluirSocio("Amancio Ortega", 1);
        $vc->incluirSocio("Pablo Picasso", 2, 2);
        
        $vc->alquilarSocioProducto(1, 2);
        $vc->alquilarSocioProducto(1, 3);
        
        $vc->alquilarSocioProducto(1, 2);
        
        $vc->alquilarSocioProducto(1, 6);
        
        $vc->listarSocios();
    }
    catch (ClienteNoEncontradoException $e)
    {
        echo $e->getMessage();
    }
    catch (SoporteNoEncontradoException $e)
    {
        echo $e->getMessage();
    }
    catch (CupoSuperadoException $e)
    {
        echo $e->getMessage();
    }
    catch (SoporteYaAlquiladoException $e)
    {
        echo $e->getMessage();
    }
    catch (VideoclubException $e)
    {
        echo $e->getMessage();
    }
    catch (Exception $e)
    {
        echo $e->getMessage();
    }
?>