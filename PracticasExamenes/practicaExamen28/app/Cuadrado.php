<?php

namespace app;

class Cuadrado extends Figura
{
    public function __construct($base)
    {
        parent::__construct($base);
    }

    public function dibujarFigura()
    {
        $toHtml = "";
        for ($i = 0; $i < $this->base; $i++) {
            $toHtml .= "<p>";
            for ($j = 0; $j < $this->base; $j++) {
                $toHtml .= " X ";
            }
            $toHtml .= "</p>";
        }
        return $toHtml;
    }
}
