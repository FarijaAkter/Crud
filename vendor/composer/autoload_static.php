<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc9b6846ec8c9917bd9e449b265cb1e21
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Farija\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Farija\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc9b6846ec8c9917bd9e449b265cb1e21::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc9b6846ec8c9917bd9e449b265cb1e21::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc9b6846ec8c9917bd9e449b265cb1e21::$classMap;

        }, null, ClassLoader::class);
    }
}
