<?php
/**
 * @var string $package
 */
use yii\helpers\Html;
?>

<div class="row">
    <div class="col-sm-12">
        <?=Html::beginForm('', 'post', ['id'=>'install-form', 'data-ajax-url'=>['default/command']])?>
            <div class="form-group">
                <label>Write full package name</label>
                <?=Html::textInput('package', $package, ['class'=>'form-control', 'placeholder'=>'Package Name'])?>
                <p class="text-danger"></p>
                <small class="text-muted">Full package name it is - <b>vendor/vendor1</b></small>
            </div>
            <div class="form-group">
                <label>Write package version</label>
                <?=Html::textInput('version', '', ['class'=>'form-control', 'placeholder'=>'Version'])?>
                <p class="text-danger"></p>
            </div>
            <?=Html::submitButton('Install', ['class'=>'btn btn-block btn-info']);?>
        <?=Html::endForm();?>
    </div>
</div>
