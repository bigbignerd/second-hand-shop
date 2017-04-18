<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Classify */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="container" style="width: 100%">
    <div class="row" style="text-align: center;">
        <h2 class="w3-head">修改个人信息</h2>
    </div>
    <div class="row" style="padding: 5px 15px;">
        <div class="col-md-12">
            <?php $form = ActiveForm::begin(); ?>
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <?= $form->field($model, 'name')->textInput() ?>

                <?= $form->field($model, 'phone')->textInput() ?>

                <?= $form->field($model, 'email')->textInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
                </div>
            </div>
            <div class="col-md-2"></div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>  