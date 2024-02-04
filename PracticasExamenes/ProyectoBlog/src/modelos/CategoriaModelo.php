<?php
    namespace Sergi\ProyectoBlog\Modelos;

    class CategoriaModelo extends Modelo
    {
        public function __construct() {
            parent::__construct();
            $this->tabla = "categorias";
        }
    }


?>