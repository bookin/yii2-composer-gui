<?
/**
 * @var $this \yii\web\View
 * @var $content string
 */

use yii\bootstrap\Nav;
use bookin\composer\gui\ModuleAsset;

$bundle = ModuleAsset::register($this);
?>
<?php $this->beginContent('@app/views/layouts/main.php'); ?>

    <!--<div class="col-sm-4">
        <?php
/*        echo Nav::widget([
            'options' => ['class' => 'nav nav-pills nav-stacked'],
            'items' => [
                ['label' => 'Home', 'url' => ['/site/index']],
                ['label' => 'About', 'url' => ['/site/about']],
                ['label' => 'Contact', 'url' => ['/site/contact']],
                Yii::$app->user->isGuest ?
                    ['label' => 'Login', 'url' => ['/site/login']] :
                    [
                        'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                        'url' => ['/site/logout'],
                        'linkOptions' => ['data-method' => 'post']
                    ],
            ],
        ]);
        */?>
    </div>-->

    <div class="col-sm-12">
        <?= $content ?>
    </div>

<?php $this->endContent(); ?>