<?php

namespace classes;

use Classes\Exceptions\ExceptionFacturaNoExiste;
use classes\Validator;
use Exception;

class Cliente
{
    private string $nombre;
    private string $nrp;
    private array $facturas;

    public function __construct($nombre, $nrp)
    {
        $this->nombre = $nombre;
        $this->nrp = $nrp;
        $this->facturas = array();
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function addFactura(Factura $factura)
    {
        //Hay que modificar el NRP de la factura para asignarla al cliente
        $factura->addNrpFactura($this->nrp);
        $this->facturas[$factura->getMes()][] = $factura;
    }

    public function pagarFactura($mesFactura, $posicionFactura)
    {
        if (isset($this->facturas[$mesFactura[$posicionFactura]])) {
            $factura = $this->facturas[$mesFactura][$posicionFactura];
            $factura->setPagada();
        } else {
            throw new ExceptionFacturaNoExiste("Factura no existe");
        }
    }




    public function listFacturas()
    {
        echo "<h1>Facturas del Cliente: $this->nombre</h1>";
        foreach ($this->facturas as $mes => $factura) {
            echo "<h2>Factura del mes:" . Generics::convertirNumeroEnMes($mes) . "</h2>";
            foreach ($factura as $facturaInfo) {
                echo "<p>{$facturaInfo->getConcepto()}</p>";
                echo "<p>{$facturaInfo->getCuantia()}</p>";
                echo "<p>{$facturaInfo->getPagada()}</p>";
            }
        }
    }
}
