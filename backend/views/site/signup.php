<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>

<section>
    <div id="agileits-sign-in-page" class="sign-in-wrapper">
        <div class="agileinfo_signin">
        <h3>用户注册</h3>
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
        
                <?= $form->field($model, 'username')->textInput(['placeholder'=>'请输入用户名','autofocus' => true]) ?>

                <?= $form->field($model, 'email')->textInput(['placeholder'=>'请输入邮箱']) ?>

                <?= $form->field($model, 'phone')->textInput(['placeholder'=>'请输入手机号']) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'role')->radioList(['1'=>'买家','2'=>'卖家'])?>
                <input type="submit" value="注册">
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</section>
