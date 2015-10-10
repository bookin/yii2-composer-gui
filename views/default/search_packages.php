<?
/**
 * @var array $packages
 */
use yii\helpers\Html;
?>
<?foreach($packages as $package){?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>
                <?if(isset($package['repository'])){?>
                    <?=Html::a($package['name'], $package['repository'], ['target'=>'_blank'])?>
                <?}else{?>
                    <?=$package['name']?>
                <?}?>
            </h4>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-9 col-lg-10">
                    <p>
                        <?if(isset($package['description'])){?>
                            <?=$package['description']?>
                        <?}?>
                    </p>
                </div>
                <div class="col-sm-3 col-lg-2">
                    <div>
                        <?if(isset($package['downloads'])){?>
                            <i class="glyphicon glyphicon-arrow-down"></i><?=\Yii::$app->formatter->asInteger($package['downloads'])?>
                        <?}?>
                    </div>
                    <div>
                        <?if(isset($package['favers'])){?>
                            <i class="glyphicon glyphicon-star"></i><?=\Yii::$app->formatter->asInteger($package['favers'])?>
                        <?}?>
                    </div>
                </div>
            </div>

        </div>
    </div>
<?}?>