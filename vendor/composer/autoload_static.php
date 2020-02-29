<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9b90fee687e66fbd7747c7d759199c5a
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Abraham\\TwitterOAuth\\' => 21,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Abraham\\TwitterOAuth\\' => 
        array (
            0 => __DIR__ . '/..' . '/abraham/twitteroauth/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9b90fee687e66fbd7747c7d759199c5a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9b90fee687e66fbd7747c7d759199c5a::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}