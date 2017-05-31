<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Goods;

$this->title = '订单详细';
$this->params['breadcrumbs'][] = ['label' => 'Order', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container" style="width: 100%">
	<div class="row" style="text-align: center;">
		<h2 class="w3-head">订单详情</h2>
	</div>
	<div class="row" style="padding: 5px 15px;">
		<div class="col-md-12">

		    <?= DetailView::widget([
		        'model' => $model,
		        'attributes' => [
		            [
		            	'attribute' => 'goodsName',
		            	'value' => function($data){
		            		return Goods::getInfoBykey($data->goodsId,'name');
		            	}
		            ],
		            [
		            	'attribute' => 'price',
		            	'value' => function($data){
		            		return Goods::getInfoBykey($data->goodsId,'price');
		            	}
		            ],
		            [
	            	'attribute' => 'created_at',
		            	'value' => function($data){
		            		return date('Y年m月d日 H:i',$data->created_at);
		            	}
		            ],
		            'name',
		            'address',
		            'phone'
		        ],
		    ]) ?>
		</div>
	</div>
</div>	