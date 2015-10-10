<?php

namespace bookin\composer\module\controllers;

use yii\web\Controller;
use \Yii;
use yii\web\Response;

class DefaultController extends Controller
{
    public $layout = 'main';

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionTest(){
        $composer = Yii::$app->composer;
        var_dump($composer::searchPackage('yii2'));
    }

    public function actionPackages(){
        $composer = Yii::$app->composer;
        $packages = $composer::getLocalPackages();
        return $this->renderAjax('packages',['packages'=>$packages]);
    }

    public function actionSearch($query){
        $composer = Yii::$app->composer;
        return $composer::findPackage($query);
        $packages = $composer::searchPackage($query);
        return $this->renderAjax('search_packages',['packages'=>$packages]);

    }

    public function actionCommand($command){
        Yii::$app->response->format = Response::FORMAT_RAW;
        $params = Yii::$app->request->getQueryParams();
        $options = [];
        if(isset($params['options'])){
            $options = $params['options'];
        }
        $composer = Yii::$app->composer;
        return $composer::runCommand($command, $options);
    }
}
