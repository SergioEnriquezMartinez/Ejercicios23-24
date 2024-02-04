<?php
    namespace Sergi\ProyectoBlog\Ayudantes;
    use Monolog\Logger;
    use Monolog\Handler\StreamHandler;
    use Psr\Log\LoggerInterface;
    use Monolog\Level;

    class LogFactory
    {
        public static function getLogger(string $canal = 'BLOG') : LoggerInterface {
            $log = new Logger($canal);
            $log->pushHandler(new StreamHandler('logs/Debug.log', Level::Debug));
            $log->pushHandler(new StreamHandler('logs/Errores.log', Level::Error, false));
            $log->pushHandler(new StreamHandler('logs/Info.log', Level::Info));

            return $log;
        }
    }
    
?>