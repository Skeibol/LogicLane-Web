<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit052e6605a9e946c78b546dccef1c37bc
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit052e6605a9e946c78b546dccef1c37bc::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit052e6605a9e946c78b546dccef1c37bc::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit052e6605a9e946c78b546dccef1c37bc::$classMap;

        }, null, ClassLoader::class);
    }
}
