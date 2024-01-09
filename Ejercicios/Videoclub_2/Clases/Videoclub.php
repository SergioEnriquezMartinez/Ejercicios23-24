<?php

    namespace Clases;

    use Clases\Excepciones\ClienteNoEncontradoException;
    use Clases\Excepciones\SoporteNoEncontradoException;
use Clases\Excepciones\SoporteYaAlquiladoException;

    class Videoclub
    {
        private $nombre;
        private $productos;
        private $numProductos;
        private $socios;
        private $numSocios;

        public function __construct($nombre)
        {
            $this->nombre = $nombre;
            $this->productos = [];
            $this->numProductos = 0;
            $this->socios = [];
            $this->numSocios = 0;
        }

        private function incluirProducto(Soporte $s)
        {
            array_push($this->productos, $s);
            $this->numProductos++;
        }

        public function incluirCintaVideo($titulo, $precio, $numero, $duracion)
        {
            $this->incluirProducto(new CintaVideo($titulo, $numero, $precio, $duracion));
        }

        public function incluirDvd($titulo, $precio, $numero, $idiomas, $formatoPantalla)
        {
            $this->incluirProducto(new Dvd($titulo, $numero, $precio, $idiomas, $formatoPantalla));
        }

        public function incluirJuego($titulo, $precio, $numero, $consola, $minJugadores, $maxJugadores)
        {
            $this->incluirProducto(new Juego($titulo, $numero, $precio, $consola, $minJugadores, $maxJugadores));
        }

        public function incluirSocio($nombre, $numero, $maxAlquilerConcurrente = 3)
        {
            array_push($this->socios, new Cliente($nombre, $numero, $maxAlquilerConcurrente));
            $this->numSocios++;
        }

        public function listarProductos()
        {
            echo "<h4>Productos del videoclub: ".$this->nombre."</h4>";
            foreach ($this->productos as $producto) {
                $producto->muestraResumen();
            }
        }

        public function listarSocios()
        {
            echo "<h4>Socios del videoclub: ".$this->nombre."</h4>";
            foreach ($this->socios as $socio) {
                $socio->muestraResumen();
            }
        }

        public function alquilarSocioProducto($numeroSocio, $numeroProducto)
        {
            if (!isset($this->socios[$numeroSocio]))
            {
                throw new ClienteNoEncontradoException("El cliente no existe");
            }
            if (!isset($this->productos[$numeroProducto]))
            {
                throw new SoporteNoEncontradoException("El producto no existe");
            }

            $socio = $this->socios[$numeroSocio];
            $producto = $this->productos[$numeroProducto];
            $socio->alquilar($producto);
            return $this;
        }

        public function alquilarSocioProductos($numeroSocio, $numerosProductos)
        {
            if (!isset($this->socios[$numeroSocio]))
            {
                throw new ClienteNoEncontradoException("El cliente no existe");
            }
            $socio = $this->socios[$numeroSocio];

            foreach ($numerosProductos as $producto) {
                if (!isset($producto) && !in_array($producto, $numerosProductos))
                {
                    throw new SoporteNoEncontradoException("El producto no existe");
                }

                if ($producto->alquilado)
                {
                    throw new SoporteYaAlquiladoException("El producto ya está alquilado");
                }
                else
                {
                    $socio->alquilar($producto);
                }
            }
            return $this;
        }

        public function devolverSocioProducto($numeroSocio, $numeroProducto)
        {
            if (!isset($this->socios[$numeroSocio]))
            {
                throw new ClienteNoEncontradoException("El cliente no existe");
            }
            if (!isset($this->productos[$numeroProducto]))
            {
                throw new SoporteNoEncontradoException("El producto no existe");
            }

            $socio = $this->socios[$numeroSocio];
            $producto = $this->productos[$numeroProducto];
            $socio->devolver($producto);
            return $this;
        }
        
        public function devolverSocioProductos($numeroSocio, $numerosProductos)
        {
            if (!isset($this->socios[$numeroSocio]))
            {
                throw new ClienteNoEncontradoException("El cliente no existe");
            }
            $socio = $this->socios[$numeroSocio];

            foreach ($numerosProductos as $producto) {
                if (!isset($producto) && in_array($producto, $numerosProductos))
                {
                    throw new SoporteNoEncontradoException("El producto no existe");
                }

                if (!$producto->alquilado)
                {
                    throw new SoporteYaAlquiladoException("El producto no está alquilado");
                }
                else
                {
                    $socio->devolver($producto);
                }
            }
            return $this;
        }
    }
?>