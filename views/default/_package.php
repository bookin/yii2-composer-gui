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
        <h4>
            <?=Html::a($package->getName(), $package->getSourceUrl(), ['target'=>'_blank'])?>
            <small>(<?=$package->getVersion()?>)</small>
            <?=Html::a(
                '<span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span>',
                $package->getDistUrl(),
                ['encode'=>false, 'target'=>'_blank', 'class'=>'pull-right']);
            ?>
        </h4>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-8">
                <p><?=$package->getDescription()?></p>
                <?//=Html::a('Open Source', $package->getSourceUrl(), ['target'=>'_blank'])?>
                <?=Html::a('<span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Update', ['default/command', 'command'=>'update', 'options'=>[$package->getName()]], [
                    'encode'=>false,
                    'class'=>'show-ajax-modal',
                    'data-header'=>'Update - '.$package->getName(),
                ])?>

                <?=Html::a('<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Delete', ['default/command', 'command'=>'remove', 'options'=>[$package->getName()]], [
                    'encode'=>false,
                    'class'=>'show-ajax-modal',
                    'data-header'=>'Delete - '.$package->getName(),
                ])?>
            </div>
            <div class="col-sm-4">
                <?if($authors = $package->getAuthors()){?>
                    <ul class="list-group">
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
                                    <b><?=$author['name']?></b> <?=isset($author['role'])?Html::tag('small', '('.$author['role'].')'):''?>
                                <?}?>
                            </li>
                        <?}?>
                    </ul>
                <?}?>
            </div>
        </div>
    </div>
</div>