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
				<?php if($isNamed):?>
			    <div class="form-group">
			        <?= Html::submitButton($model->isNewRecord ? '发布' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success']) ?>
			    </div>
				<?php else:?>
					<p style="color:red;margin-bottom: 5px;">您还未进行实名认证,请实名认证</p>
					<a class="btn btn-success" href="<?=Yii::$app->urlManager->createAbsoluteUrl(['center/real-name','id'=>Yii::$app->user->identity->id])?>">实名认证</a>
				</div>
				<?php endif;?>
				<div class="col-md-2"></div>

			<?php ActiveForm::end(); ?>
		</div>
	</div>
</div>	