<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite943ba04747f28c8d86b924c3e89d784
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'LINE\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'LINE\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
            1 => __DIR__ . '/..' . '/linecorp/line-bot-sdk/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite943ba04747f28c8d86b924c3e89d784::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite943ba04747f28c8d86b924c3e89d784::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
