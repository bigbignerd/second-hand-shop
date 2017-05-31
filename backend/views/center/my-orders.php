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
	            [
	            	'attribute' => 'status',
	            	'value' => function($data){
	            		$role = Yii::$app->user->identity->role;
	            		$map = [
	            			'1' => [
	            				'0' => '等待卖家发货',
	            				'1' => '卖家已发货',
	            				'2' => '订单完成',
	            			],
	            			'2' => [
	            				'0' => '等待发货',
	            				'1' => '已发货',
	            				'2' => '订单完成',
	            			],
	            		];
	            		return $map[$role][$data->status];
	            	}
	            ],
	            [
	            	'class' => 'yii\grid\ActionColumn',
	            	'template' => '{view} {status}',
	            	'headerOptions' => ['width'=>'80px'],
	            	'buttons' => [
	            		'view' => function($url, $model, $key){
	            			$url = Yii::$app->urlManager->createAbsoluteUrl(['center/order-detail','id'=>$model->id]);
	            			return Html::a("查看", $url, ['title'=>'查看订单详情', 'class'=>'']);
	            		},
	            		'status' => function($url, $model, $key){
	            			$role = Yii::$app->user->identity->role;
	            			$url = Yii::$app->urlManager->createAbsoluteUrl(['center/order-status','id'=>$model->id,'status'=>$model->status]);
	            			//status 0 创建订单 1 卖家发货 2 买家确认收货
	            			if($model->status == '0'){
	            				if($role == '2'){
                            		return Html::a("<br />确认发货", $url, ['title'=>'', 'class'=>'']);
	            				}else{
	            					return '';
	            				}
	            			}elseif($model->status == '1'){
	            				if($role == '2'){
	            					return '';
	            				}else{
                            		return Html::a("<br />确认收货", $url, ['title'=>'', 'class'=>'']);
	            				}
	            			}else{
	            				return '';
	            			}
	            		}
	            	],
	            ],
	        ],
	    ]); ?>
		</div>
	</div>
</div>	