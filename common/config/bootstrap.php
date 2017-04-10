<?php
Yii::setAlias('@common', dirname(__DIR__));
Yii::setAlias('@frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('@backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('@console', dirname(dirname(__DIR__)) . '/console');

Yii::setAlias('public', dirname(dirname(__DIR__)).'/public');
Yii::setAlias('jsPath','http://'.$_SERVER['SERVER_NAME'].'/public/js');
Yii::setAlias('cssPath','http://'.$_SERVER['SERVER_NAME'].'/public/css');
Yii::setAlias('imgPath','http://'.$_SERVER['SERVER_NAME'].'/public/images');
Yii::setAlias('plugin','http://'.$_SERVER['SERVER_NAME'].'/public/plugins');