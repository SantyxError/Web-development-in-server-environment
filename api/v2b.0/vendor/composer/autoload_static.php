<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0182e7cbc5bc14be699c2e8ec8f11698
{
    public static $files = array (
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
        '667aeda72477189d0494fecd327c3641' => __DIR__ . '/..' . '/symfony/var-dumper/Resources/functions/dump.php',
        '0e423a14e27410a071e5d815d3ffc856' => __DIR__ . '/..' . '/larapack/dd/src/helper.php',
        '31fbc6397d84474ec7e60302be42dea6' => __DIR__ . '/../..' . '/src/helpers.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Polyfill\\Mbstring\\' => 26,
            'Symfony\\Component\\VarDumper\\' => 28,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'Symfony\\Component\\VarDumper\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/var-dumper',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'B' => 
        array (
            'Bramus' => 
            array (
                0 => __DIR__ . '/..' . '/bramus/router/src',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0182e7cbc5bc14be699c2e8ec8f11698::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0182e7cbc5bc14be699c2e8ec8f11698::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit0182e7cbc5bc14be699c2e8ec8f11698::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit0182e7cbc5bc14be699c2e8ec8f11698::$classMap;

        }, null, ClassLoader::class);
    }
}
