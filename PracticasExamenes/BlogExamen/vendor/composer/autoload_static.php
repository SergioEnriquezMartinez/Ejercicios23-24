<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit286e666609d0e3d133195abccc674a7c
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Spipu\\Html2Pdf\\' => 15,
            'Sergi\\ProyectoBlog\\Vistas\\' => 26,
            'Sergi\\ProyectoBlog\\Modelos\\' => 27,
            'Sergi\\ProyectoBlog\\Entidades\\' => 29,
            'Sergi\\ProyectoBlog\\Database\\' => 28,
            'Sergi\\ProyectoBlog\\Controladores\\' => 33,
            'Sergi\\ProyectoBlog\\Config\\' => 26,
            'Sergi\\ProyectoBlog\\Ayudantes\\' => 29,
        ),
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
        'M' => 
        array (
            'Monolog\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Spipu\\Html2Pdf\\' => 
        array (
            0 => __DIR__ . '/..' . '/spipu/html2pdf/src',
        ),
        'Sergi\\ProyectoBlog\\Vistas\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/vistas',
        ),
        'Sergi\\ProyectoBlog\\Modelos\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/modelos',
        ),
        'Sergi\\ProyectoBlog\\Entidades\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/entidades',
        ),
        'Sergi\\ProyectoBlog\\Database\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/database',
        ),
        'Sergi\\ProyectoBlog\\Controladores\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/controladores',
        ),
        'Sergi\\ProyectoBlog\\Config\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/config',
        ),
        'Sergi\\ProyectoBlog\\Ayudantes\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/ayudantes',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/src',
        ),
        'Monolog\\' => 
        array (
            0 => __DIR__ . '/..' . '/monolog/monolog/src/Monolog',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Datamatrix' => __DIR__ . '/..' . '/tecnickcom/tcpdf/include/barcodes/datamatrix.php',
        'PDF417' => __DIR__ . '/..' . '/tecnickcom/tcpdf/include/barcodes/pdf417.php',
        'QRcode' => __DIR__ . '/..' . '/tecnickcom/tcpdf/include/barcodes/qrcode.php',
        'TCPDF' => __DIR__ . '/..' . '/tecnickcom/tcpdf/tcpdf.php',
        'TCPDF2DBarcode' => __DIR__ . '/..' . '/tecnickcom/tcpdf/tcpdf_barcodes_2d.php',
        'TCPDFBarcode' => __DIR__ . '/..' . '/tecnickcom/tcpdf/tcpdf_barcodes_1d.php',
        'TCPDF_COLORS' => __DIR__ . '/..' . '/tecnickcom/tcpdf/include/tcpdf_colors.php',
        'TCPDF_FILTERS' => __DIR__ . '/..' . '/tecnickcom/tcpdf/include/tcpdf_filters.php',
        'TCPDF_FONTS' => __DIR__ . '/..' . '/tecnickcom/tcpdf/include/tcpdf_fonts.php',
        'TCPDF_FONT_DATA' => __DIR__ . '/..' . '/tecnickcom/tcpdf/include/tcpdf_font_data.php',
        'TCPDF_IMAGES' => __DIR__ . '/..' . '/tecnickcom/tcpdf/include/tcpdf_images.php',
        'TCPDF_IMPORT' => __DIR__ . '/..' . '/tecnickcom/tcpdf/tcpdf_import.php',
        'TCPDF_PARSER' => __DIR__ . '/..' . '/tecnickcom/tcpdf/tcpdf_parser.php',
        'TCPDF_STATIC' => __DIR__ . '/..' . '/tecnickcom/tcpdf/include/tcpdf_static.php',
        'Zebra_Pagination' => __DIR__ . '/..' . '/stefangabos/zebra_pagination/Zebra_Pagination.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit286e666609d0e3d133195abccc674a7c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit286e666609d0e3d133195abccc674a7c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit286e666609d0e3d133195abccc674a7c::$classMap;

        }, null, ClassLoader::class);
    }
}
