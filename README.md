![header](https://habrastorage.org/files/c33/0b5/b6c/c330b5b6c8bf4fce8b7a864a3656a606.JPG)

> Please, don't forget to Star★ the repo if you are interested this project!

## Installation

[![Total Downloads](https://poser.pugx.org/bookin/yii2-composer-gui/downloads)](https://packagist.org/packages/bookin/yii2-composer-gui)
[![Monthly Downloads](https://poser.pugx.org/bookin/yii2-composer-gui/d/monthly)](https://packagist.org/packages/bookin/yii2-composer-gui)
[![License](https://poser.pugx.org/bookin/yii2-composer-gui/license)](https://packagist.org/packages/bookin/yii2-composer-gui)

The preferred way to install this extension is through [composer](http://getcomposer.org/download/). 

To install, either run

```
$ php composer.phar require bookin/yii2-composer-gui "@dev"
```

or add

```
"bookin/yii2-composer-gui": "@dev"
```

to the ```require``` section of your `composer.json` file.

## Usage

### Configure component:

```
'modules'=>[
    'composer'=>[
        'class'=>'bookin\composer\gui\Module'
    ],
]
```

#### Open - `http://domain.loc/composer`
 
P.S. It is beta, some functions might not work, or work but not as expected.
P.S.S. You can create requests with your suggestions to changes to improve module.