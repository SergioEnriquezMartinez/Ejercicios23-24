<?php

namespace app;

class Rectangulo extends Figura
{
    private $altura;

    public function __construct($base, $altura)
    {
        parent::__construct($base);
        $this->altura = $altura;
    }

    public function dibujarFigura()
    {
        $toHtml = "";
        for ($i = 0; $i < $this->altura; $i++) {
            $toHtml .= "<p>";
            for ($j = 0; $j < $this->base; $j++) {
                $toHtml .= " X ";
            }
            $toHtml .= "</p>";
        }
        return $toHtml;
    }
}
