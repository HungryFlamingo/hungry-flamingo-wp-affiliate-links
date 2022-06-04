<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7de8ce811c8905d2fe2162d8615a775d
{
    public static $files = array (
        'c14057a02afc95b84dc5bf85d98c5b66' => __DIR__ . '/..' . '/julien731/wp-dismissible-notices-handler/handler.php',
        'ff8834a662873e3e689a4283b27598d2' => __DIR__ . '/..' . '/julien731/wp-dismissible-notices-handler/includes/helper-functions.php',
        '42671a413efb740d7040437ff2a982cd' => __DIR__ . '/..' . '/ayecode/wp-super-duper/sd-functions.php',
        'ac773ca18bc86f9208de2ed8068423eb' => __DIR__ . '/..' . '/johnbillion/extended-cpts/functions.php',
        'a50f2d2ba04e0c6b552331bf2bdeba41' => __DIR__ . '/..' . '/julien731/wp-review-me/review.php',
        'e67733b1c67d30ae0534fc358ce6ccd9' => __DIR__ . '/..' . '/stevegrunwell/wp-cache-remember/wp-cache-remember.php',
        'ab9c306a707f0fda77eaa634dc02fca6' => __DIR__ . '/..' . '/wpbp/cronplus/cronplus.php',
        '0509b34a4bd7aebefeac629c9dc8a978' => __DIR__ . '/..' . '/wpdesk/wp-notice/src/WPDesk/notice-functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'WPDesk\\PluginBuilder\\' => 21,
            'WPDesk\\Notice\\' => 14,
        ),
        'M' => 
        array (
            'Micropackage\\Requirements\\' => 26,
            'Micropackage\\Internationalization\\' => 34,
        ),
        'I' => 
        array (
            'Inpsyde\\' => 8,
        ),
        'H' => 
        array (
            'HungryFlamingo\\WpAffiliateLinks\\' => 32,
        ),
        'E' => 
        array (
            'ExtCPTs\\Tests\\' => 14,
            'ExtCPTs\\' => 8,
        ),
        'C' => 
        array (
            'Composer\\Installers\\' => 20,
        ),
        'A' => 
        array (
            'Args\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'WPDesk\\PluginBuilder\\' => 
        array (
            0 => __DIR__ . '/..' . '/wpdesk/wp-builder/src',
        ),
        'WPDesk\\Notice\\' => 
        array (
            0 => __DIR__ . '/..' . '/wpdesk/wp-notice/src/WPDesk/Notice',
        ),
        'Micropackage\\Requirements\\' => 
        array (
            0 => __DIR__ . '/..' . '/micropackage/requirements/src',
        ),
        'Micropackage\\Internationalization\\' => 
        array (
            0 => __DIR__ . '/..' . '/micropackage/internationalization/src',
        ),
        'Inpsyde\\' => 
        array (
            0 => __DIR__ . '/..' . '/inpsyde/wp-context/src',
        ),
        'HungryFlamingo\\WpAffiliateLinks\\' => 
        array (
            0 => __DIR__ . '/../../..' . '/hungry-flamingo-wp-affiliate-links/php-src',
        ),
        'ExtCPTs\\Tests\\' => 
        array (
            0 => __DIR__ . '/..' . '/johnbillion/extended-cpts/tests/integration',
        ),
        'ExtCPTs\\' => 
        array (
            0 => __DIR__ . '/..' . '/johnbillion/extended-cpts/src',
        ),
        'Composer\\Installers\\' => 
        array (
            0 => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers',
        ),
        'Args\\' => 
        array (
            0 => __DIR__ . '/..' . '/johnbillion/args/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'WPDesk_Buildable' => __DIR__ . '/..' . '/wpdesk/wp-builder/src/Plugin/WithoutNamespace/Buildable.php',
        'WPDesk_Has_Plugin_Info' => __DIR__ . '/..' . '/wpdesk/wp-builder/src/Plugin/WithoutNamespace/Has_Plugin_Info.php',
        'WPDesk_Plugin_Info' => __DIR__ . '/..' . '/wpdesk/wp-builder/src/Plugin/WithoutNamespace/Plugin_Info.php',
        'WPDesk_Translable' => __DIR__ . '/..' . '/wpdesk/wp-builder/src/Plugin/WithoutNamespace/Translable.php',
        'WPDesk_Translatable' => __DIR__ . '/..' . '/wpdesk/wp-builder/src/Plugin/WithoutNamespace/Translatable.php',
        'WP_Super_Duper' => __DIR__ . '/..' . '/ayecode/wp-super-duper/wp-super-duper.php',
        'Yoast_I18n_WordPressOrg_v3' => __DIR__ . '/..' . '/yoast/i18n-module/src/i18n-wordpressorg-v3.php',
        'Yoast_I18n_v3' => __DIR__ . '/..' . '/yoast/i18n-module/src/i18n-v3.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7de8ce811c8905d2fe2162d8615a775d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7de8ce811c8905d2fe2162d8615a775d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit7de8ce811c8905d2fe2162d8615a775d::$classMap;

        }, null, ClassLoader::class);
    }
}
