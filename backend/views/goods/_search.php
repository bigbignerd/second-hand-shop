<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\GoodsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="goods-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'classifyId') ?>

    <?= $form->field($model, 'childClassifyId') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'desc') ?>

    <?php // echo $form->field($model, 'number') ?>

    <?php // echo $form->field($model, 'images') ?>

    <?php // echo $form->field($model, 'condition') ?>

    <?php // echo $form->field($model, 'publisherId') ?>

    <?php // echo $form->field($model, 'city') ?>

    <?php // echo $form->field($model, 'viewNum') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
