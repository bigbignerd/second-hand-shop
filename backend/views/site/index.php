<?php

/* @var $this yii\web\View */

$this->title = 'BigNerd dashboard';
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
				<a href="###" class="w3layouts-explore">Explore</a>
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
	<div class="w3l-popular-ads">  
		<h3>最新商品推荐</h3>
		 <div class="w3l-popular-ads-info">
			<div class="col-md-4 w3ls-portfolio-left">
				<div class="portfolio-img event-img">
					<img src="images/ad1.jpg" class="img-responsive" alt="">
					<div class="over-image"></div>
				</div>
				<div class="portfolio-description">
				   <h4><a href="cars.html">Latest Cars</a></h4>
				   <p>Suspendisse placerat mattis arcu nec por</p>
					<a href="cars.html">
						<span>Explore</span>
					</a>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="col-md-4 w3ls-portfolio-left">
				<div class="portfolio-img event-img">
					<img src="images/ad2.jpg" class="img-responsive" alt="">
					 <div class="over-image"></div>
				</div>
				<div class="portfolio-description">
				   <h4><a href="real-estate.html">Apartments for Sale</a></h4>
				   <p>Suspendisse placerat mattis arcu nec por</p>
					<a href="real-estate.html">
						<span>Explore</span>
					</a>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="col-md-4 w3ls-portfolio-left">
				<div class="portfolio-img event-img">
					<img src="images/ad3.jpg" class="img-responsive" alt="">
					 <div class="over-image"></div>
				</div>
				<div class="portfolio-description">
				   <h4><a href="jobs.html">BPO jobs</a></h4>
				   <p>Suspendisse placerat mattis arcu nec por</p>
					<a href="jobs.html">
						<span>Explore</span>
					</a>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="col-md-4 w3ls-portfolio-left">
				<div class="portfolio-img event-img">
					<img src="images/ad4.jpg" class="img-responsive" alt="">
					 <div class="over-image"></div>
				</div>
				<div class="portfolio-description">
				   <h4><a href="electronics-appliances.html">Accessories</a></h4>
				   <p>Suspendisse placerat mattis arcu nec por</p>
					<a href="electronics-appliances.html">
						<span>Explore</span>
					</a>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="col-md-4 w3ls-portfolio-left">
				<div class="portfolio-img event-img">
					<img src="images/ad5.jpg" class="img-responsive" alt="">
					 <div class="over-image"></div>
				</div>
				<div class="portfolio-description">
				   <h4><a href="furnitures.html">Home Appliances</a></h4>
				   <p>Suspendisse placerat mattis arcu nec por</p>
					<a href="furnitures.html">
						<span>Explore</span>
					</a>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="col-md-4 w3ls-portfolio-left">
				<div class="portfolio-img event-img">
					<img src="images/ad6.jpg" class="img-responsive" alt="">
					 <div class="over-image"></div>
				</div>
				<div class="portfolio-description">
				   <h4><a href="fashion.html">Clothing</a></h4>
				   <p>Suspendisse placerat mattis arcu nec por</p>
					<a href="fashion.html">
						<span>Explore</span>
					</a>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"> </div>
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
