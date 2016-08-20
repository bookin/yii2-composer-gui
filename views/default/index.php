<?
/**
 * @var $this \yii\web\View
 * @var $bundle \app\modules\composerGui\ModuleAsset
 */
use yii\helpers\Url;
use yii\helpers\Html;

$assetPath = $this->context->module->assetsBase;
?>

<div class="row">
    <div class="col-sm-8">
        <ul class="list-inline">
            <li>
                <?=Html::a('Install',['default/install'],[
                    'class'=>'show-ajax-modal',
                    'data-header'=>'Install package'
                ])?>
            </li>
            <li>
                <?=Html::a('List',['default/command', 'command'=>'list'],[
                    'class'=>'show-ajax-modal',
                    'data-header'=>'Lists commands'
                ])?>
            </li>
            <li>
                <?=Html::a('Help',['default/command', 'command'=>'help'],[
                    'class'=>'show-ajax-modal',
                    'data-header'=>'Help'
                ])?>
            </li>
            <li>
                <?=Html::a('Update All',['default/command', 'command'=>'update'],[
                    'class'=>'show-ajax-modal',
                    'data-header'=>'Update All'
                ])?>
            </li>
        </ul>
    </div>
    <div class="col-sm-4">
        <div class="input-group">
            <?=Html::textInput('query', '', ['id'=>'search-field', 'class'=>'form-control', 'placeholder'=>'package name']);?>
            <span class="input-group-btn">
                <?=Html::a('<span class="glyphicon glyphicon-search" aria-hidden="true"></span>',['default/search'],[
                    'id'=>'search-button',
                    'class'=>'btn btn-default show-ajax-modal',
                    'data-header'=>'Search',
                ])?>
            </span>
        </div>
    </div>
</div>


<h4>Packages:</h4>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-12">
                <div id="packages">
                    <p class="text-center">
                        <?=Html::img($assetPath.'/img/loader.gif');?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<?
yii\bootstrap\Modal::begin([
    'id' => 'ajax-modal',
    'size' => 'modal-lg',
    'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
]);
echo Html::tag('div',Html::img($assetPath.'/img/loader.gif'),['class'=>'text-center']);
yii\bootstrap\Modal::end();
?>
<?
$this->registerJs('
    $(function(){
        $("#packages").load("'.Url::to('default/packages').'");
    });
');
?>
