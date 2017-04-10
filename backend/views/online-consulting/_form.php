<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\OnlineConsulting */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="online-consulting-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sellerId')->textInput() ?>

    <?= $form->field($model, 'buyerId')->textInput() ?>

    <?= $form->field($model, 'goodsId')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
