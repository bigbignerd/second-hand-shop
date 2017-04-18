<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Goods */

$this->title = '个人中心';
$this->params['breadcrumbs'][] = ['label' => 'center', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container" style="width: 100%">
	<div class="row" style="text-align: center;">
		<h2 class="w3-head">我的个人信息</h2>
	</div>
	<div class="row" style="padding: 5px 15px;">
		<div class="col-md-12">
			<?= Html::a('修改个人信息', ['update-info', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
			<?php if(Yii::$app->user->identity->role == 2):?>
				<?= Html::a('实名认证', ['###', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
			<?php endif;?>
		</div>
	</div>
	<div class="row" style="padding: 5px 15px;">
		<div class="col-md-12">

		    <?= DetailView::widget([
		        'model' => $model,
		        'attributes' => [
		        	'username',
		        	'phone',
		        	'name',
		        	'email',
		        	'created_at:datetime',
		        ],
		    ]) ?>
		</div>
	</div>
</div>	