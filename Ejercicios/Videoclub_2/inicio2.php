<?php
    include_once "autoload.php";
    use Clases\Cliente;
    use Clases\CintaVideo;
    use Clases\Dvd;
    use Clases\Juego;
    use Clases\Excepciones\ClienteNoEncontradoException;
    use Clases\Excepciones\SoporteNoEncontradoException;
    use Clases\Excepciones\CupoSuperadoException;
    use Clases\Excepciones\SoporteYaAlquiladoException;
    use Clases\Excepciones\VideoclubException;

    try
    {
        //instanciamos un par de objetos cliente
        $cliente1 = new Cliente("Bruce Wayne", 23);
        $cliente2 = new Cliente("Clark Kent", 33);
        
        //mostramos el número de cada cliente creado 
        echo "<br>El identificador del cliente 1 es: " . $cliente1->getNumero();
        echo "<br>El identificador del cliente 2 es: " . $cliente2->getNumero();
        
        //instancio algunos soportes 
        $soporte1 = new CintaVideo("Los cazafantasmas", 23, 3.5, 107);
        $soporte2 = new Juego("The Last of Us Part II", 26, 49.99, "PS4", 1, 1);  
        $soporte3 = new Dvd("Origen", 24, 15, "es,en,fr", "16:9");
        $soporte4 = new Dvd("El Imperio Contraataca", 4, 3, "es,en","16:9");
        
        //alquilo algunos soportes
        $cliente1->alquilar($soporte1);
        $cliente1->alquilar($soporte2);
        $cliente1->alquilar($soporte3);
        
        //voy a intentar alquilar de nuevo un soporte que ya tiene alquilado
        $cliente1->alquilar($soporte1);
        //el cliente tiene 3 soportes en alquiler como máximo
        //este soporte no lo va a poder alquilar
        $cliente1->alquilar($soporte4);
        //este soporte no lo tiene alquilado
        $cliente1->devolver(4);
        //devuelvo un soporte que sí que tiene alquilado
        $cliente1->devolver(26);
        //alquilo otro soporte
        $cliente1->alquilar($soporte4);
        //listo los elementos alquilados
        $cliente1->listaAlquileres();
        //este cliente no tiene alquileres
        $cliente2->devolver(4);
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