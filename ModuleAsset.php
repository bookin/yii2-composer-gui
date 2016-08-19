<?php

namespace bookin\composer\gui;


use yii\web\AssetBundle;

class ModuleAsset extends AssetBundle
{
    public $sourcePath  = '@bookin/composer/gui/assets';

    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];

    public $publishOptions = [
        'forceCopy'=>true//YII_ENV_DEV
    ];

    public $css = [
        'css/main.css'
    ];

    public $js = [
        'js/main.js'
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}