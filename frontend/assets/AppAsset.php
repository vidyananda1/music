<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css'
    ];
    public $js = [
        'js/main.js',
        'https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
