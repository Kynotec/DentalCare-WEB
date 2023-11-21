<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'index/css/animate.compat.css',
        'index/css/animate.css',
        'index/css/animations.css',
        'index/css/bootstrap.css',
        'index/css/fontawesome.css',
        'index/css/solid.css',
        'index/css/style.css',
        'index/css/site.css',

    ];
    public $js = [
        'index/js/main.js',
        'index/js/bootstrap.js',
        'index/js/bootstrap.esm.js',
        'index/js/bootstrap.bundle.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
