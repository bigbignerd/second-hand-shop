<?php

/* @var $this yii\web\View */

$this->title = 'BigNerd dashboard';
$image = Yii::getAlias("@imgPath");
?>
<!-- 首页滚动导航 -->
<div class="slider">
	<ul class="rslides large-btns large-btns1" id="slider" style="max-width: 800px;">
		<li id="large-btns1_s0" class="" style="display: block; float: none; position: absolute; opacity: 0; z-index: 1; transition: opacity 500ms ease-in-out;">
			<div class="w3ls-slide-text">
				<h3>搜索查看所有的商品分类</h3>
				<a href="###" class="w3layouts-explore-all">Explore</a>
			</div>
		</li>
		<li id="large-btns1_s1" class="large-btns1_on" style="float: left; position: relative; opacity: 1; z-index: 2; display: list-item; transition: opacity 500ms ease-in-out;">
			<div class="w3ls-slide-text">
				<h3>查看所有商品信息</h3>
				<a href="<?=Yii::$app->urlManager->createAbsoluteUrl(['goods/index'])?>" class="w3layouts-explore">Explore</a>
			</div>
		</li>
	</ul>
	<a href="#" class="large-btns_nav large-btns1_nav prev">Previous</a>
	<a href="#" class="large-btns_nav large-btns1_nav next">Next</a>
</div>
<!-- content 部分 -->
<div class="main-content" style="background-color: #fff">
	<!-- 热门选购分类 -->
	<div class="w3-categories">
		<h3>热门选购分类</h3>
		<div class="container">
			<?php 
				$count = 1;
			?>
			<?php foreach($hotClassify as $k => $classify):?>
			<div class="col-md-3">
				<div class="focus-grid w3layouts-boder<?=$count++?>">
					<a class="btn-8" href="###">
						<div class="focus-border">
							<div class="focus-layout">
								<div class="focus-image"><i style="background-color: <?=$classify['color']?>" class="<?=$classify['icon']?>"></i></div>
								<h4 class="clrchg"><?=$classify['name']?></h4>
							</div>
						</div>
					</a>
				</div>
			</div>
			<?php endforeach;?>
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- 最新商品推荐 -->
	<div class="w3l-popular-ads" style="width:100%;float: left;background-color: #fff">  
		<h3>最新商品推荐</h3>
		<div class="w3l-popular-ads-info">
		 	<?php foreach($latestGoods as $g => $goods): ?>
			<div class="col-md-4 w3ls-portfolio-left">
				<div class="portfolio-img event-img">
					<img style="width: 201px;height: 201px;object-fit: cover" src="<?=$goods['images']?>" class="img-responsive" alt="">
					<div class="over-image"></div>
				</div>
				<div class="portfolio-description">
				   <h4><a href="<?=Yii::$app->urlManager->createAbsoluteUrl(['goods/view','id'=>$goods['id']])?>"><?=$goods['name']?></a></h4>
				   <p><?=$goods['title']?></p>
					<a href="<?=Yii::$app->urlManager->createAbsoluteUrl(['goods/view','id'=>$goods['id']])?>">
						<span>查看</span>
					</a>
				</div>
				<div class="clearfix"> </div>
			</div>
			<?php endforeach;?>
		</div>
	</div>
	<!-- 合作伙伴 -->
	<div class="w3layouts-partners" style="float: left;width: 100%">
		<h3>合作伙伴</h3>
		<div class="container">
			<ul>
				<li><a href="#"><img class="img-responsive" src="<?=$image?>/p-1.png" alt=""></a></li>
				<li><a href="#"><img class="img-responsive" src="<?=$image?>/p-2.png" alt=""></a></li>
				<li><a href="#"><img class="img-responsive" src="<?=$image?>/p-3.png" alt=""></a></li>
				<li><a href="#"><img class="img-responsive" src="<?=$image?>/p-4.png" alt=""></a></li>
				<li><a href="#"><img class="img-responsive" src="<?=$image?>/p-5.png" alt=""></a></li>
				<li><a href="#"><img class="img-responsive" src="<?=$image?>/p-6.png" alt=""></a></li>
				<li><a href="#"><img class="img-responsive" src="<?=$image?>/p-7.png" alt=""></a></li>
				<li><a href="#"><img class="img-responsive" src="<?=$image?>/p-8.png" alt=""></a></li>
				<li><a href="#"><img class="img-responsive" src="<?=$image?>/p-9.png" alt=""></a></li>
				<li><a href="#"><img class="img-responsive" src="<?=$image?>/p-10.png" alt=""></a></li>	
			</ul>
		</div>
	</div>
</div>

<script>
$(function () {	
  $("#slider").responsiveSlides({
	auto: true,
	pager: false,
	nav: true,
	speed: 500,
	maxwidth: 800,
	namespace: "large-btns"
  });
});
</script>
