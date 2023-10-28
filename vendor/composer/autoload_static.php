<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit07109721554761f854d79d45a2cec650
{
    public static $prefixLengthsPsr4 = array (
        'R' => 
        array (
            'Router\\' => 7,
        ),
        'O' => 
        array (
            'Obang\\GestionPlaintes\\' => 22,
        ),
        'D' => 
        array (
            'Database\\' => 9,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Router\\' => 
        array (
            0 => __DIR__ . '/../..' . '/routers',
        ),
        'Obang\\GestionPlaintes\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'Database\\' => 
        array (
            0 => __DIR__ . '/../..' . '/database',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit07109721554761f854d79d45a2cec650::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit07109721554761f854d79d45a2cec650::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit07109721554761f854d79d45a2cec650::$classMap;

        }, null, ClassLoader::class);
    }
}
