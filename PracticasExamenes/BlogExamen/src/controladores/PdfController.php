<?php
    namespace Sergi\ProyectoBlog\Controladores;

    use Spipu\Html2Pdf\Html2Pdf;

    class PdfController {
        public function index() {}

        public function print() {
            if (isset($_SESSION["entradasPDF"])) {
                $html2pdf = new Html2Pdf('L', 'A4', 'es');
                ob_start();
                    require_once 'vistas/pdfs/entradas.php';
                    $info = ob_get_clean();
                ob_end_clean();

                $html2pdf->writeHTML($info);
                $html2pdf->output(); // Si ponemos una ruta como parámetro, se guardará el PDF en esa ruta
            }
        }
    }
?>