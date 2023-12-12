<?php

namespace classes;

use Classes\Exceptions\ExceptionCuantia;

require_once "autoload.php";

class Factura
{
    private const IVA = 10;
    private string $idFactura;
    private string $concepto;
    private int $mes;
    private float $cuantia;
    private bool $pagada;
    private string $fechaPago;
    private static int $numFacturas = 0;

    public function __construct(string $concepto, float $cuantia, int $mes = 0)
    {
        if (!Validator::validatePositiveFloat($cuantia)) throw new ExceptionCuantia("ERROR CUANTIA");
        if ($mes == 0) $this->mes = (int)date("m");
        $this->concepto = $concepto;
        $this->cuantia = $cuantia;
        $this->mes = $mes;
        $this->pagada = false;
        Factura::$numFacturas++;
        $this->idFactura = Factura::generarIdFactura();
    }
    public function getConcepto(): string
    {
        return $this->concepto;
    }
    public function getMes(): int
    {
        return $this->mes;
    }
    public function getCuantia(): float
    {
        return $this->cuantia;
    }
    public function getPagada(): bool
    {
        return $this->pagada;
    }

    public function getCuantiaIVA()
    {
        return $this->cuantia + $this->cuantia * Factura::IVA / 100;
    }

    public function setPagada()
    {
        $this->pagada = true;
        $this->fechaPago = date("d") . "/" . date("m") . "/" . date("Y");
    }
    public static function generarIdFactura(): string
    {
        $id = Factura::$numFacturas;
        $id .= "_" . date("Y") . date("m") . date("d");
        return $id;
    }

    public function addNrpFactura(string $nrp)
    {
        $this->idFactura .= "_" . $nrp . "_" . rand(1000, 9999);
    }

    public function __toString()
    {
        $cadena = "<table>";
        $cadena .= "<tr><th>ID.FACTURA</th><th>Concepto</th><th>Cuantia</th><th>¿Pagada?</th></tr>";
        $cadena .= "<tr>";
        $cadena .= "<td>$this->idFactura</td>";
        $cadena .= "<td>$this->concepto</td>";
        $cadena .= "<td>" . Generics::convertirNumeroEnMes($this->mes) . "</td>";
        $cadena .= "<td>$" . $this->getCuantiaIVA() . "</td>";
        $cadena .= "</tr>";
        $cadena .= "</table>";
    }
}
