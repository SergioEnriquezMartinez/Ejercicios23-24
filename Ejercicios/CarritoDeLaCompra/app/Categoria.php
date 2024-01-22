<?php
namespace app;
class Categoria{
    private int $idCategoria;
    private string $nombreCategoria;

    public function __construct(int $id, string $nombre){
        $this->idCategoria = $id;
        $this->nombreCategoria = $nombre;
    }
    public function getId(){
        return $this->idCategoria;
    }
    public function getNombreCategoria(){
        return $this->nombreCategoria;
    }
    public function setId(int $id){
        $this->idCategoria = $id;
    }
    public function setNombreCategoria(string $nombre){
        $this->nombreCategoria = $nombre;
    }
}
    ?>