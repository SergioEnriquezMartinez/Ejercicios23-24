<?php
include __DIR__ ."/vendor/autoload.php";
// include "vendor/autoload.php";

use Monolog\Formatter\HtmlFormatter;
use Monolog\Handler\BrowserConsoleHandler;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Processor\IntrospectionProcessor;
use Monolog\Processor\WebProcessor;

$log = new Logger("Cliente");
$log->pushHandler(new BrowserConsoleHandler(\Monolog\Level::Debug));

//$log->pushHandler(new StreamHandler("logs/logError.html", \Monolog\Level::Error));
$handler = new StreamHandler("logs/logError.html", \Monolog\Level::Error);
$handler->setFormatter(new HtmlFormatter());
$log->pushHandler($handler);

$log->pushProcessor(new IntrospectionProcessor());
$log->pushProcessor(new WebProcessor());



//$log->pushHandler(new StreamHandler("logs/logDebug.log", \Monolog\Level::Debug));

$log->debug("Esto es un mensaje de DEBUG");
$log->info("Esto es un mensaje de INFO");
$log->warning("Esto es un mensaje de WARNING");

$log->error("Esto es un mensaje de ERROR");
$log->critical("Esto es un mensaje de CRITICAL");
$log->alert("Esto es un mensaje de ALERT");

$codProducto = 3;
$log->warning("Producto no encontrado", ["codProducto" => $codProducto]);
$log->error("Producto no encontrado", ["codProducto" => $codProducto]);
