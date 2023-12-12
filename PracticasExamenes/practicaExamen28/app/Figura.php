<?php

namespace app;

abstract class Figura
{
    protected $base;

    public function __construct($base)
    {
        $this->base = $base;
    }

    public abstract function dibujarFigura();
}
