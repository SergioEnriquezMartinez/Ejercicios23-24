<?php

    include_once "Soporte.php";

    class Cliente
    {

        public $nombre;
        private $numero;
        private $soportesAlquilados;
        private $numSoportesAlquilados;
        private $maxAlquilerConcurrente;

        public function __construct($nombre, $numero, $maxAlquilerConcurrente = 3)
        {
            $this->nombre = $nombre;
            $this->numero = $numero;
            $this->soportesAlquilados = [];
            $this->numSoportesAlquilados = 0;
            $this->maxAlquilerConcurrente = $maxAlquilerConcurrente;
        }

        public function getNumero()
        {
            return $this->numero;
        }

        public function setNumero($numero)
        {
            $this->numero = $numero;
        }

        public function getNumSoportesAlquilados()
        {
            return $this->numSoportesAlquilados;
        }

        public function muestraResumen()
        {
            echo "<p>Nombre: ".$this->nombre."</p>";
            echo "<p>Cantidad de alquileres: ".count($this->soportesAlquilados)."</p>";
        }

        public function tieneAlquilado(Soporte $s) : bool
        {
            return in_array($s, $this->soportesAlquilados);
        }

        public function alquilar(Soporte $s) : Cliente
        {
            if (!$this->tieneAlquilado($s))
            {
                if ($this->numSoportesAlquilados < $this->maxAlquilerConcurrente)
                {
                    array_push($this->soportesAlquilados, $s);
                    $this->numSoportesAlquilados++;
                    echo "<p>El producto ha sido alquilado a ".$this->nombre."</p>";
                    $s->muestraResumen();
                    echo "<hr>";
                    return $this;
                }
                else
                {
                    echo "<p>El cliente tiene ". $this->numSoportesAlquilados." elementos alquilados. No puede alquilar más en este videoclub hasta que no devuelva algo.</p>";
                    return $this;
                }
            }
            else
            {
                echo "<p>El cliente ya tiene alquilado el producto ".$s->titulo."</p>";
                return $this;
            }
        }

        public function devolver(int $numSoporte) : bool
        {
           foreach ($this->soportesAlquilados as $soporte)
           {
                if ($soporte->getNumero() == $numSoporte)
                {
                    unset($this->soportesAlquilados[array_search($soporte, $this->soportesAlquilados)]);
                    $this->numSoportesAlquilados--;
                    echo "<p>El producto ha sido devuelto</p>";
                    return true;
                }
                else
                {
                    echo "<p>El cliente no tiene alquilado este producto</p>";
                    return false;
                }
           }
           return false;
        }

        public function listaAlquileres() : void
        {
            echo "<p>El cliente tiene ".$this->numSoportesAlquilados." soportes alquilados:</p>";
            foreach ($this->soportesAlquilados as $soporte)
            {
                $soporte->muestraResumen();
            }
        }
    }

?>