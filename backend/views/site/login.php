<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<section>
    <div id="agileits-sign-in-page" class="sign-in-wrapper">
        <div class="agileinfo_signin">
        <h3>用户登陆</h3>
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>
                
                <label class="checkbox"><input type="checkbox" name="LoginForm[rememberMe]">Remember me</label>
                
                <input type="submit" value="登陆">
            <?php ActiveForm::end(); ?>
            <h6> 还不是注册会员? <a href="signup.html">去注册</a> </h6>
        </div>
    </div>
</section>
