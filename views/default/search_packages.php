<?
/**
 * @var array $packages
 */
use yii\helpers\Html;
?>
<?foreach($packages as $package){?>
    <?if(!isset($package['repository'])){continue;}?>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-8 col-lg-9">
                    <h4>
                        <?if(isset($package['repository'])){?>
                            <?=Html::a($package['name'], $package['repository'], ['target'=>'_blank'])?>
                        <?}else{?>
                            <?=$package['name']?>
                        <?}?>
                    </h4>
                    <p>
                        <?if(isset($package['description'])){?>
                            <?=$package['description']?>
                        <?}?>
                    </p>
                </div>
                <div class="col-sm-4 col-lg-3">
                    <div>
                        <?if(isset($package['downloads'])){?>
                            <span><i class="glyphicon glyphicon-arrow-down"></i></span>
                            <span><?=\Yii::$app->formatter->asInteger($package['downloads'])?></span>
                        <?}?>
                    </div>
                    <div>
                        <?if(isset($package['favers'])){?>
                            <span><i class="glyphicon glyphicon-star"></i></span>
                            <span><?=\Yii::$app->formatter->asInteger($package['favers'])?></span>
                        <?}?>
                    </div>
                    <div>
                        <?=Html::a('Install', ['default/command', 'command'=>'require', 'options'=>$package['name']], ['class'=>'btn btn-info btn-sm btn-block'])?>
                    </div>
                </div>
            </div>

        </div>
    </div>
<?}?>