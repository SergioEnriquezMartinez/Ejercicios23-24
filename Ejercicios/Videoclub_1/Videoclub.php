<?php

    include_once "Cliente.php";
    include_once "Dvd.php";
    include_once "CintaVideo.php";
    include_once "Juego.php";

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
            $socio = $this->socios[$numeroSocio];
            $producto = $this->productos[$numeroProducto];
            if ($socio->alquilar($producto)) {
                echo "<p>El producto ha sido alquilado a ".$socio->nombre."</p>";
            } else {
                echo "<p>El producto no ha podido ser alquilado a ".$socio->nombre."</p>";
            }
        }
    }
?>