<?php

namespace bookin\composer\module;


use yii\web\AssetBundle;

class ModuleAsset extends AssetBundle
{
    public $sourcePath  = '@bookin/composer/module/assets';

    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];

    public $publishOptions = [
        'forceCopy'=>YII_ENV_DEV
    ];

    public $css = [];

    public $js = [
        'js/main.js'
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}