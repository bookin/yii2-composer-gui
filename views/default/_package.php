<?
/**
 * @var $this yii\web\View
 * @var \Composer\Package\CompletePackage $package
 */
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="panel panel-default">
    <div class="panel-heading">
            <?=Html::a($package->getName(), $package->getSourceUrl(), ['target'=>'_blank', 'class'=>'package-name'])?>
            <small>(<?=$package->getPrettyVersion()?>)</small>
            <small class="text-muted"><?=Yii::$app->formatter->asDate($package->getReleaseDate(), "long")?></small>

            <?=\yii\bootstrap\ButtonGroup::widget([
                'buttons' => [
                    Html::a(
                        '<span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Update',
                        ['default/command', 'command'=>'update', 'options'=>['packages'=>[$package->getName()]]],
                        [
                            'encode'=>false,
                            'class'=>'show-ajax-modal btn-xs',
                            'data-header'=>'Update - '.$package->getName(),
                        ]
                    ),
                    Html::a(
                        '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Delete',
                        ['default/command', 'command'=>'remove', 'options'=>['packages'=>[$package->getName()]]],
                        [
                            'encode'=>false,
                            'class'=>'show-ajax-modal btn-xs',
                            'data-header'=>'Delete - '.$package->getName(),
                        ]
                    ),
                    Html::a(
                        '<span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> Download',
                        $package->getDistUrl(),
                        [
                            'encode'=>false,
                            'target'=>'_blank',
                            'class'=>'btn-xs'
                        ]
                    )
                ],
                'options'=>[
                    'class'=>'pull-right'
                ]
            ]);?>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-8">
                <p><?=$package->getDescription()?></p>
                <?//=Html::a('Open Source', $package->getSourceUrl(), ['target'=>'_blank'])?>
                <div>
                    <?if($licenses = $package->getLicense()){?>
                        <small>License:</small>&nbsp;
                        <?foreach($licenses as $license){?>
                            <?echo Html::tag('span',$license,['class'=>'label label-default'])?>
                        <?}?>
                    <?}?>
                </div>
                <div>
                    <?if($keywords = $package->getKeywords()){?>
                        <small>Keywords:</small>&nbsp;
                        <?foreach($keywords as $keyword){?>
                            <?echo Html::tag('span',$keyword,['class'=>'label label-default'])?>
                        <?}?>
                    <?}?>
                </div>
                <div>
                    <?if($requires = $package->getRequires()){?>
                        <small>Requires:</small>&nbsp;
                        <?foreach($requires as $name=>$info){?>
                            <?echo Html::tag('span',$name.' '.$info->getPrettyConstraint(),['class'=>'label label-default'])?>
                        <?}?>
                    <?}?>
                </div>
            </div>
            <div class="col-sm-4">
                <?if($authors = $package->getAuthors()){?>
                    <ul class="authors list-group">
                        <?foreach($authors as $author){?>
                            <li class="list-group-item">
                                <span>
                                    <?
                                    if(isset($author['email'])){
                                        echo Html::a(
                                            '<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>',
                                            'mailto:'.$author['email'],
                                            [
                                                'encode'=>false,
                                                'target'=>'_blank',
                                            ]
                                        );
                                    }
                                    ?>
                                </span>
                                <span>
                                    <?
                                    if(isset($author['homepage'])){
                                        echo Html::a(
                                            '<span class="glyphicon glyphicon-link" aria-hidden="true"></span>',
                                            $author['homepage'],
                                            [
                                                'encode'=>false,
                                                'target'=>'_blank'
                                            ]
                                        );
                                    }
                                    ?>
                                </span>
                                <?if(isset($author['name'])){?>
                                    <b><?=$author['name']?></b>
                                    <?if(isset($author['role'])){?>
                                        <p><?=Html::tag('small', '('.$author['role'].')')?></p>
                                    <?}?>
                                <?}?>
                            </li>
                        <?}?>
                    </ul>
                <?}?>
            </div>
        </div>
    </div>
</div>