<?php
use yii\helpers\Html;
use yii\grid\GridView;
?>
<div class="container" style="width: 100%">
	<div class="row" style="text-align: center;">
		<h2 class="w3-head">我发布的商品列表</h2>
	</div>
	<div class="row" style="padding: 5px 15px;">
		<div class="col-md-12">
		<?= GridView::widget([
	        'dataProvider' => $dataProvider,
	        'filterModel' => $searchModel,
	        'columns' => [
	            ['class' => 'yii\grid\SerialColumn'],

	            'title',
	            'name',
	            [
	            	'attribute' => 'classifyId',
	            	'value' => function($data) use($searchModel){
	            		return $searchModel->mainClassify[$data->classifyId];
	            	}
	            ],
	            // 'childClassifyId',
	            'price',
	            // 'desc',
	            // 'number',
	            // 'images:ntext',
	            // 'condition',
	            // 'publisherId',
	            // 'city',
	            'viewNum',
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