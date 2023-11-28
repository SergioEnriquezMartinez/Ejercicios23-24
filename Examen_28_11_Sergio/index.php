<?php
use Classes\Cliente;
use Classes\Factura;

$facturaDibujoOct = new Factura("Clases de dibujo", 30, 10);
$facturaBalletNov = new Factura("Clases de ballet", 42);
$facturaAjedrezNov = new Factura("Clases de ajedrez", 27);

$clienteJuan = new Cliente("Juan López", "12345P");
$clienteJuan->addFactura($facturaDibujoOct);
$clienteJuan->pagarFactura(10, 0);
$clienteJuan->listarFacturas();

$clienteTeresa = new Cliente("Teresa Aragón", "07879F");
$clienteTeresa->addFactura($facturaDibujoOct);
$clienteTeresa->addFactura($facturaBalletNov);
$clienteTeresa->addFactura($facturaAjedrezNov);
$clienteTeresa->listarFacturas();

?>