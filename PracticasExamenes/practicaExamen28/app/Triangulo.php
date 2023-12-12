<?php

namespace app;

class Triangulo extends Figura
{
    private $altura;

    public function __construct($altura)
    {
        $this->altura = $altura;
    }

    function dibujarFigura()
    {
        $toHtml = "";
        for ($i = 0; $i < $this->altura; $i++) {
            $toHtml .= "<p>";
            for ($j = 0; $j < $this->altura - $i; $j++) {
                $toHtml .= "&nbsp;";
            }
            for ($k = 0; $k < $i; $k++) {
                $toHtml .= "X";
            }
            $toHtml .= "</p>";
        }
        return $toHtml;
    }
}
