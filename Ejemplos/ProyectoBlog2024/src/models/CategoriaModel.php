<?php
namespace Mgj\ProyectoBlog2024\Models;

class CategoriaModel extends Model{
    public function __construct(){
        parent::__construct();
        $this->tabla = "categorias";
    }
}