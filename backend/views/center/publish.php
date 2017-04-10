<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="container" style="width: 100%">
	<div class="row" style="text-align: center;">
		<h2 class="w3-head">发布一件闲置物品</h2>
	</div>
	<div class="row" style="padding: 5px 15px;">
		<div class="col-md-12">
				<?php $form = ActiveForm::begin(); ?>
				<div class="col-md-2"></div>
				<div class="col-md-8">
			    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

			    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

			    <?= $form->field($model, 'classifyId')->textInput() ?>

			    <?= $form->field($model, 'childClassifyId')->textInput() ?>

			    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

			    <?= $form->field($model, 'desc')->textInput(['maxlength' => true]) ?>

			    <?= $form->field($model, 'number')->textInput() ?>

			    <?= $form->field($model, 'images')->textarea(['rows' => 6]) ?>

			    <?= $form->field($model, 'condition')->textInput() ?>

			    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

			    <div class="form-group">
			        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
			    </div>
				</div>
				<div class="col-md-2"></div>

				<?php ActiveForm::end(); ?>
		</div>
	</div>
</div>	