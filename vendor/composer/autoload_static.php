<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0dd1eb366fad5240c7c7a47320d7fdc2
{
    public static $prefixesPsr0 = array (
        'o' => 
        array (
            'org\\bovigo\\vfs' => 
            array (
                0 => __DIR__ . '/..' . '/mikey179/vfsStream/src/main/php',
            ),
        ),
        'O' => 
        array (
            'OpenBoleto\\' => 
            array (
                0 => __DIR__ . '/..' . '/kriansa/openboleto/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInit0dd1eb366fad5240c7c7a47320d7fdc2::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
