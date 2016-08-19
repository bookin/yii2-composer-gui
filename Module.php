<?php
namespace bookin\composer\gui;

use bookin\composer\api\Composer;
use \Yii;

/**
 * Class Module
 * @package app\modules\composerGui
 *
 */
class Module extends \yii\base\Module
{
    public $controllerNamespace = 'bookin\composer\gui\controllers';

    public $_assetsBase, $_assetsPath;

    public function init()
    {
        parent::init();

        if (!isset(Yii::$app->i18n->translations['bookin-composer-module'])) {
            Yii::$app->i18n->translations['bookin-composer-module'] = [
                'class' => 'yii\i18n\PhpMessageSource',
                'sourceLanguage' => 'en',
                'basePath' => '@bookin/composer/module/messages'
            ];
        }
    }

    //отдаем путь до assets
    public static function getAssetsPath()
    {
        return dirname(__FILE__) . '/assets';
    }

    //отдаем полный путь до папки assets с файлами модуля
    public function getPublishedUrl()
    {
        return Yii::$app->assetManager->getPublishedUrl($this->assetsPath);
    }

    //публикуем файлы из папки assets и возвращаем путь до нее
    public function getAssetsBase()
    {
        if ($this->_assetsBase === null) {
            $assets = $this->assetsPath;
            list(,$url)=Yii::$app->assetManager->publish($assets, ['forceCopy'=>YII_ENV_DEV]);
            $this->_assetsBase = $url;
        }
        return $this->_assetsBase;
    }

    public function getComposer(){
        return Composer::getInstance(Yii::getAlias('@app/composer.json'), Yii::getAlias('@app'));
    }
}
