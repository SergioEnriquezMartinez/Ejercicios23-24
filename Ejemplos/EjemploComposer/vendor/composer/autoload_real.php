<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitb57f0841fcb741ea2a8719d7f83533d6
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInitb57f0841fcb741ea2a8719d7f83533d6', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitb57f0841fcb741ea2a8719d7f83533d6', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitb57f0841fcb741ea2a8719d7f83533d6::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
