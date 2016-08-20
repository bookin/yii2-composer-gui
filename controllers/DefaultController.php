<?php

namespace bookin\composer\gui\controllers;

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

    public function actionInstall(){
        $package = Yii::$app->request->get('package')?:'';
        return $this->renderAjax('install_form',['package'=>$package]);
    }

    public function actionPackages(){
        $composer = $this->module->composer;
        $packages = $composer::getLocalPackages();
        return $this->renderAjax('packages',['packages'=>$packages]);
    }

    public function actionSearch($query){
        $composer = $this->module->composer;
        //$packages = $composer::findPackage($query,'*');
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
        $composer = $this->module->composer;
        return $composer::runCommand($command, $options);
    }
}
