<?
/**
 * @var $this \yii\web\View
 * @var $content string
 */

use bookin\composer\gui\ModuleAsset;

$bundle = ModuleAsset::register($this);
?>
<?php $this->beginContent('@app/views/layouts/main.php'); ?>

    <div class="col-sm-12">
        <?= $content ?>
    </div>

<?php $this->endContent(); ?>