<?php
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

defined('YII_PAHT') or define('YII_PAHT',__DIR__.'/');
defined('BACKEND') or define('BACKEND',YII_PAHT.'/backend/');
require(YII_PAHT . 'vendor/autoload.php');
require(YII_PAHT . 'vendor/yiisoft/yii2/Yii.php');
require(YII_PAHT . 'common/config/bootstrap.php');
require(BACKEND . 'config/bootstrap.php');

$config = yii\helpers\ArrayHelper::merge(
    require(YII_PAHT . 'common/config/main.php'),
    require(YII_PAHT . 'common/config/main-local.php'),
    require(BACKEND . 'config/main.php'),
    require(BACKEND . 'config/main-local.php')
);

$application = new yii\web\Application($config);
$application->run();
