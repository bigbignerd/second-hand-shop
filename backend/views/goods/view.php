<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Goods */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Goods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$image = Yii::getAlias("@imgPath");
$jsPath = Yii::getAlias("@jsPath");
?>
<style type="text/css">
    .comment{
        border-bottom: 1px dotted #ccc;
        padding-top: 20px;
        padding-bottom: 20px;
        padding-left: 0px;
    }
    .cnt{
        color:#666;
        font-size: 18px;
    }
    .cnt span{margin-right: 20px;}
    .time{margin-top: 5px;font-size: 12px; }
</style>
<!-- 导航 -->
<div class="w3layouts-breadcrumbs text-center">
    <div class="container">
        <span class="agile-breadcrumbs">
        <a href="index.html"><i class="fa fa-home home_1"></i></a> / 
        <a href="categories.html">商品</a> / 
        <span>详情</span></span>
    </div>
</div>
<div class="single-page main-grid-border" style="background-color: #fff">
    <div class="container">
        <div class="product-desc">
            <div class="col-md-7 product-view">
                <h2><?=$model->title?></h2>
                <p> <i class="glyphicon glyphicon-map-marker"></i><a href="javascript:void(0);">城市</a>, <a href="javascript:void(0);"><?=$model->city?></a>| 发布于 <?php echo date('m.d H:i', $model->created_at)?>, ID: 987654321</p>
                <div class="flexslider">
                    
                    <div class="flex-viewport" style="overflow: hidden; position: relative;">
                        <ul class="slides" style="width: 1200%; transition-duration: 0.6s; transform: translate3d(-2500px, 0px, 0px);">
                            <li data-thumb="<?=$image?>/ss4.jpg" class="clone" aria-hidden="true" style="width: 625px; float: left; display: block;">
                                <img style="height: 250px;object-fit: cover;" src="<?=$image?>/ss4.jpg" draggable="false">
                            </li>
                            <li data-thumb="<?=$image?>/ss1.jpg" class="" style="width: 625px; float: left; display: block;">
                                <img style="height: 250px;object-fit: cover;" src="<?=$image?>/ss1.jpg" draggable="false">
                            </li>
                            <li data-thumb="<?=$image?>/ss2.jpg" class="" style="width: 625px; float: left; display: block;">
                                <img style="height: 250px;object-fit: cover;" src="<?=$image?>/ss2.jpg" draggable="false">
                            </li>
                            <li data-thumb="<?=$image?>/ss3.jpg" class="" style="width: 625px; float: left; display: block;">
                                <img style="height: 250px;object-fit: cover;" src="<?=$image?>/ss3.jpg" draggable="false">
                            </li>
                            <li data-thumb="<?=$image?>/ss4.jpg" class="flex-active-slide" style="width: 625px; float: left; display: block;">
                                <img style="height: 250px;object-fit: cover;" src="<?=$image?>/ss4.jpg" draggable="false">
                            </li>
                            <li data-thumb="<?=$image?>/ss1.jpg" class="clone" aria-hidden="true" style="width: 625px; float: left; display: block;">
                                <img style="height: 250px;object-fit: cover;" src="<?=$image?>/ss1.jpg" draggable="false">
                            </li>
                        </ul>
                    </div>
                    <!-- <ol class="flex-control-nav flex-control-thumbs">
                        <li><img src="<?=$image?>/ss1.jpg" class="" draggable="false"></li>
                        <li><img src="<?=$image?>/ss2.jpg" draggable="false" class=""></li>
                        <li><img src="<?=$image?>/ss3.jpg" draggable="false" class=""></li>
                        <li><img src="<?=$image?>/ss4.jpg" draggable="false" class="flex-active"></li>
                    </ol> -->
                    <ul class="flex-direction-nav">
                        <li class="flex-nav-prev"><a class="flex-prev" href="#">Previous</a></li>
                        <li class="flex-nav-next"><a class="flex-next" href="#">Next</a></li>
                    </ul>
                </div>
            <!-- FlexSlider -->
                <script defer="" src="<?=$jsPath?>/jquery.flexslider.js"></script>

                <script>
                    // Can also be used with $(document).ready()
                    $(window).load(function() {
                        $('.flexslider').flexslider({
                            animation: "slide",
                            controlNav: "thumbnails"
                        });
                    });
                </script>
                    <!-- //FlexSlider -->
                <div class="product-details">
                    <h4><span class="w3layouts-agileinfo">名称 </span> : <a href="javascript:void(0);"><?=$model->name?></a><div class="clearfix"></div></h4>
                    <h4><span class="w3layouts-agileinfo">浏览 </span> : <strong>150</strong></h4>
                    <h4><span class="w3layouts-agileinfo">数量 </span> : <?=$model->number?>&nbsp;个</h4>
                    <h4><span class="w3layouts-agileinfo">描述</span> :<p><?=$model->desc?></p><div class="clearfix"></div></h4>
                </div>
                <!-- 用户留言 -->
                <div class="product-details" style="margin-top: 20px;">
                    <div class="col-md-3" style="height: 40px;line-height:40px;background-color: #ffda44;text-align: center;"><b>用户留言</b></div>
                    <div class="col-md-12">
                        <textarea></textarea>
                        <a href="##" type="button" class="btn btn-primary">确定</a>
                    </div>
                    <div class="col-md-12" style="padding: 0px">
                        <div class="col-md-12 comment">
                            <div class="cnt"><span>xxx</span>6000收了</div>
                            <div class="time">2017.01.01 11:24</div>
                        </div><div class="col-md-12 comment">
                            <div class="cnt"><span>xxx</span>6000收了</div>
                            <div class="time">2017.01.01 11:24</div>
                        </div><div class="col-md-12 comment">
                            <div class="cnt"><span>xxx</span>6000收了</div>
                            <div class="time">2017.01.01 11:24</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 product-details-grid">
                <div class="item-price">
                    <div class="product-price">
                        <p class="p-price">价格</p>
                        <h3 class="rate">$ <?=$model->price?></h3>
                        <div class="clearfix"></div>
                    </div>
                    <div class="condition">
                        <p class="p-price">成色</p>
                        <h4><?=$model->goodsCondition[$model->condition]?></h4>
                        <div class="clearfix"></div>
                    </div>
                    <div class="itemtype">
                        <p class="p-price">分类</p>
                        <h4><?=$model->mainClassify[$model->classifyId]?></h4>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="interested text-center">
                    <h4>对次商品感兴趣?<small> 点击前往咨询卖家</small></h4>
                    <p><i class="glyphicon glyphicon-earphone"></i><a href="">旺旺</a></p>
                </div>
                <div class="tips">
                    <h4>二手交易消费者安全保障服务</h4>
                    <ol>
                        <li><a href="#">卖家实名认证，真实可靠</a></li>
                        <li><a href="#">专业团队支撑，专业精英</a></li>
                        <li><a href="#">当面交易，满意再付款</a></li>
                        <li><a href="#">如遇到以下情况可能是诈骗行为：</a></li>
                        <li><a href="#">1.宝贝价格异常低</a></li>
                        <li><a href="#">2.卖家要求QQ沟通</a></li>
                        <li><a href="#">3.卖家要求直接汇款</a></li>
                    </ol>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
