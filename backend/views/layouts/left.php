<style type="text/css">
	.range{margin-left: 10px;}
</style>
<div class="total-ads main-grid-border">
	<div class="container" style="margin-bottom: 30px;">
		<div class="ads-grid">
			<!-- 个人中心左侧导航 -->
			<div class="side-bar col-md-3">
				<div class="range">
					<h3><a href="<?=Yii::$app->urlManager->createAbsoluteUrl(['center/index'])?>">个人信息</a></h3>
				</div>
				<div class="range">
					<h3><a href="<?=Yii::$app->urlManager->createAbsoluteUrl(['center/my-orders'])?>">我的订单</a></h3>
				</div>
				<?php if(Yii::$app->user->identity->role == '2'):?>
					<div class="range">
						<h3><a href="<?=Yii::$app->urlManager->createAbsoluteUrl(['center/publish-goods'])?>">发布闲置</a></h3>
					</div>
				<?php endif;?>
				<div class="range">
					<h3><a href="<?=Yii::$app->urlManager->createAbsoluteUrl(['center/my-goods'])?>">我的商品</a></h3>
				</div>
				<div class="range">
					<h3><a href="<?=Yii::$app->urlManager->createAbsoluteUrl(['center/my-news'])?>">我的消息</a></h3>
				</div>
			</div>
			<!-- 个人中心右侧data -->
			<div class="agileinfo-ads-display col-md-9">
				<div class="wrapper" style="background-color: #fff">
					<?= $content?>
				</div>
			</div>
		</div>
	</div>
</div>