<?php
/**
 * @var $this yii\web\View
 * @var \Composer\Package\CompletePackage[] $packages
 */
?>

<?foreach($packages as $package){?>
    <?=$this->render('_package',['package'=>$package])?>
    <hr>
<?}?>
