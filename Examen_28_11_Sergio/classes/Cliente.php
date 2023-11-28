<?php
namespace classes;
use Classes\Validations;
use classes\Factura;
use classes\exceptions\ExceptionNombreCliente;
use classes\exceptions\ExceptionNrpFormatoErroneo;

class Cliente {
    private string $nombre;
    private string $nrp;
    private array $facturas;

    public function __construct(string $nombre, string $nrp) {
        try {
            Validations::validateNombreCorrecto($nombre);
            $this->nombre = $nombre;
        } catch (ExceptionNombreCliente $e) {
            echo $e->getMessage();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

        try {
            Validations::validateNrpCorrecto($nrp);
            $this->nrp = $nrp;
        } catch (ExceptionNrpFormatoErroneo $e) {
            echo $e->getMessage();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getNrp() {
        return $this->nrp;
    }

    public function addFactura(Factura $factura) {
        $this->facturas[] = $factura;
    }

    public static function devolverNrp() {
        return self::getNrp();
    }

    public function pagarFactura(int $mes, int $numFactura) {
        foreach ($this->facturas as $factura) {
            if ($factura->getMes() == $mes && $factura->getNumFactura() == $numFactura) {
                $factura->setPagada(true);
            }
        }
    }

    private function facturasPorMes(int $mes) {
        foreach ($this->facturas as $factura) {
            echo "Facturas del mes: " . $factura->getMes(); 
            if ($mes == $factura->getMes()) {
                return $factura;
            }

        }
    }

    public function listarFacturas() {
        echo "<table>";
        echo "<tr>";
        echo "<th>ID.Factura</th>";
        echo "<th>Concepto</th>";
        echo "<th>Mes</th>";
        echo "<th>Cuantía con IVA</th>";
        echo "<th>¿Pagada?</th>";
        echo "</tr>";
        for ($i = 1; $i <= 12; $i++) {
            echo "<tr>";
            echo "<td>" . $this->facturasPorMes($i)->getIDFactura() . "</td>";
            echo "<td>" . $this->facturasPorMes($i)->getConcepto() . "</td>";
            echo "<td>" . $this->facturasPorMes($i)->getMes() . "</td>";
            echo "<td>" . $this->facturasPorMes($i)->getCuantiaIVA() . "</td>";
            echo "<td>" . $this->facturasPorMes($i)->getPagada() . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

}

?>