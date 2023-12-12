<?php

namespace app;

class Rombo extends Figura
{
    private $altura;

    public function __construct($altura)
    {
        $this->altura = $altura;
    }

    function dibujarFigura()
    {
        $toHtml = "";
        for ($i = 0; $i <= $this->altura; $i += 2) {
            $toHtml .= "<p>";
            for ($j = 1; $j <= ($this->altura - $i) / 2; $j++) {
                $toHtml .= "&nbsp;&nbsp;&nbsp;";
            }
            for ($j = 0; $j <= $i; $j++) {
                $toHtml .= "X";
            }
            $toHtml .= "</p>";
        }

        for ($i = $this->altura - 2; $i >= 0; $i -= 2) {
            $toHtml .= "<p>";
            for ($j = 1; $j <= ($this->altura - $i) / 2; $j++) {
                $toHtml .= "&nbsp;&nbsp;&nbsp;";
            }
            for ($j = 0; $j < $i; $j++) {
                $toHtml .= "X";
            }
            $toHtml .= "</p>";
        }
        return $toHtml;
    }
}
