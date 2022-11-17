<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3ac3f8223e17567cfd21ecbf29a1516f
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3ac3f8223e17567cfd21ecbf29a1516f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3ac3f8223e17567cfd21ecbf29a1516f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit3ac3f8223e17567cfd21ecbf29a1516f::$classMap;

        }, null, ClassLoader::class);
    }
}