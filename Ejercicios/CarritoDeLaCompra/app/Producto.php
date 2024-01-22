<?php

namespace app;

class Producto
{
    public int $id;
    private string $nombreProducto;
    private string $descripcion;
    private float $precio;
    private int $categoria;
    public function __construct(int $id, string $nombreProducto, string $descripcion, float $precio, int $categoria)
    {
        $this->id = $id;
        $this->nombreProducto = $nombreProducto;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->categoria = $categoria;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getNombreProducto()
    {
        return $this->nombreProducto;
    }
    public function getDescripcion()
    {
        return $this->descripcion;
    }
    public function getPrecio()
    {
        return $this->precio;
    }
    public function getCategoria()
    {
        return $this->categoria;
    }
    public function setID(int $id)
    {
        $this->id = $id;
    }
    public function setNombreProducto(string $nombreProducto)
    {
        $this->nombreProducto = $nombreProducto;
    }
    public function setDescripcion(string $descripcion)
    {
        $this->descripcion = $descripcion;
    }
    public function setPrecio(float $precio)
    {
        $this->precio = $precio;
    }
    public function setCategoria(int $categoria)
    {
        $this->categoria = $categoria;
    }
}
