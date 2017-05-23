<?php
use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Goods;
?>
<div class="container" style="width: 100%">
	<div class="row" style="text-align: center;">
		<h2 class="w3-head">我的订单列表</h2>
	</div>
	<div class="row" style="padding: 5px 15px;">
		<div class="col-md-12">
		<?= GridView::widget([
	        'dataProvider' => $dataProvider,
	        'filterModel' => $searchModel,
	        'columns' => [
	            ['class' => 'yii\grid\SerialColumn'],
	            [
	            	'attribute' => 'goodsImage',
	            	'format'=>'raw',
	            	'value' => function($data){
	            		$image = Goods::getInfoBykey($data->goodsId,'images');
	            		$arr = explode(",", $image);
	            		return Html::img("/public/uploads/".$arr[0],['width'=>'60px']);
	            	}
	            ],
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
	            // 'desc',
	            // 'number',
	            // 'images:ntext',
	            // 'condition',
	            // 'publisherId',
	            // 'city',
	            // 'created_at',
	            // 'updated_at',

	            [
	            	'class' => 'yii\grid\ActionColumn',
	            	'template' => '{view} {update} {delete}',
	            	'headerOptions' => ['width'=>'80px'],
	            	'buttons' => [
	            		'view' => function($url, $model, $key){
	            			$url = Yii::$app->urlManager->createAbsoluteUrl(['center/goods-detail','id'=>$model->id]);
	            			return Html::a("<span class=\"glyphicon glyphicon-eye-open\" ></span>", $url, ['title'=>'查看商品详情', 'class'=>'']);
	            		},
	            		'update' => function($url, $model, $key){
	            			$url = Yii::$app->urlManager->createAbsoluteUrl(['center/goods-update','id'=>$model->id]);
                            return Html::a("<span class=\"glyphicon glyphicon-pencil\" ></span>", $url, ['title'=>'修改商品信息', 'class'=>'']);
	            		}
	            	],
	            ],
	        ],
	    ]); ?>
		</div>
	</div>
</div>	