<?php
/*
namespace Classes;
use classes\Validations;
use classes\exceptions\ExceptionMes;
use classes\exceptions\ExceptionFacturaNoExiste;
use classes\exceptions\ExceptionCuantia;
use classes\exceptions\ExceptionFacturaYaPagada;
use classes\Generics;
use classes\Cliente;

class Factura {
    const IVA = 10;
    private string $idFactura;
    private string $concepto;
    private int $mes;
    private float $cuantia;
    private bool $pagada;
    private string $fechaPago = date("d/m/y");
    private int $numFactura = 0;


    public function __construct(string $concepto, float $cuantia, int $mes = date("m")) {
        $this->concepto = $concepto;
        try {
            Validations::validatePositiveInt($cuantia);
            $this->cuantia = $cuantia;
        } catch (ExceptionCuantia $e) {
            echo $e->getMessage();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
        try {
            Validations::validatePositiveInt($mes);
            Validations::validateRangoInt(1, 12, $mes);
            $this->mes = $mes;
        } catch (ExceptionMes $e) {
            echo $e->getMessage();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
        $this->numFactura++;
    }

    public function getConcepto() {
        return $this->concepto;
    }

    public function getMes() {
        return $this->mes;
    }

    public function getCuantia() {
        return $this->cuantia;
    }

    public function getPagada() {
        return $this->pagada;
    }

    public function getCuantiaIVA() {
        return $this->cuantia * (1 + self::IVA / 100);
    }

    private function getFechaPago() {
        return $this->fechaPago;
    }

    
    public function getIDFactura() {
        return self::addNrpFactura(Cliente::devolverNrp());
    }

    public function setPagada() {
        try {
            Validations::validateFactura($this->idFactura);
            Validations::validateFacturaPagada($this);
            self::getFechaPago();
            $this->pagada = true;
        } catch (ExceptionFacturaNoExiste $e) {
            echo $e->getMessage();
        } catch (ExceptionFacturaYaPagada $e) {
            echo $e->getMessage();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function generarFactura() : string {
        return $this->idFactura = $this->numFactura . "_" . date("y") . $this->mes . date("d");
    }

    public function addNrpFactura(string $nrp) {
        return self::generarFactura() . "_" . $nrp . "_" . Generics::aleatorio(1000,9999);
    }

}
*/
?>