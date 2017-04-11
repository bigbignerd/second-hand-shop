<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\widget\Uploadify;
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

			    <?= $form->field($model, 'classifyId')->dropdownList($model->mainClassify) ?>

			    <?= $form->field($model, 'childClassifyId')->dropdownList($model->childClassify) ?>

			    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

			    <?= $form->field($model, 'number')->textInput() ?>

			    <?= $form->field($model, 'desc')->textarea(['rows' => 6]) ?>

			    <?= $form->field($model, 'images')->textInput(['readonly'=>'readonly','id' => 'goodsImage']) ?>

			    <?= Uploadify::widget(['targetId'=>'goodsImage', 'multi'=>true])?>

			    <?= $form->field($model, 'condition')->radioList($model->goodsCondition) ?>

			    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

			    <div class="form-group">
			        <?= Html::submitButton($model->isNewRecord ? '发布' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success']) ?>
			    </div>
				</div>
				<div class="col-md-2"></div>

				<?php ActiveForm::end(); ?>
		</div>
	</div>
</div>	