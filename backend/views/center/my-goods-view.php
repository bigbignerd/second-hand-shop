<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Goods */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Goods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container" style="width: 100%">
	<div class="row" style="text-align: center;">
		<h2 class="w3-head">商品详情</h2>
	</div>
	<div class="row" style="padding: 5px 15px;">
		<div class="col-md-12">

		    <?= DetailView::widget([
		        'model' => $model,
		        'attributes' => [
		            'id',
		            'title',
		            'name',
		            [
		            	'attribute' => 'classifyId',
		            	'value' => function($data) use($model){
		            		return $model->mainClassify[$data->classifyId];
		            	}
		            ],
		            [
		            	'attribute' => 'childClassifyId',
		            	'value' => function($data) use($model){
		            		return $model->childClassify[$data->childClassifyId];
		            	}
		            ],
		            'price',
		            'desc',
		            'number',
		            'images:ntext',
		            'condition',
		            [
		            	'attribute' => 'condition',
		            	'value' => function($data) use($model){
		            		return $model->goodsCondition[$data->condition];
		            	}
		            ],
		            // 'publisherId',
		            'city',
		            'viewNum',
		            'created_at:datetime',
		            'updated_at:datetime',
		        ],
		    ]) ?>
		</div>
	</div>
</div>	