<?php

use yii\helpers\Html;
use yii\grid\GridView;

$image = Yii::getAlias("@imgPath");
/* @var $this yii\web\View */
/* @var $searchModel backend\models\GoodsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Goods';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- 导航 -->
<div class="w3layouts-breadcrumbs text-center">
    <div class="container">
        <span class="agile-breadcrumbs">
        <a href="index.html"><i class="fa fa-home home_1"></i></a> / 
        <a href="categories.html">商品</a> / 
        <span>列表</span></span>
    </div>
</div>
<div class="total-ads main-grid-border" style="background-color: #fff">
    <div class="container">
        <!-- 搜索选择框 -->
        <div class="select-box">
            <div class="browse-category ads-list">
                <label>城市</label>
                <select class="form-control" style="border-radius: 0">     
                    <option value="Mobiles">Mobiles</option>
                    <option value="Electronics &amp; Appliances">Electronics &amp; Appliances</option>             
                </select>
            </div>
            <div class="browse-category ads-list">
                <label>分类</label>
                <select class="form-control" tabindex="-98">
                  <option value="Mobiles">Mobiles</option>
                  <option value="Electronics &amp; Appliances">Electronics &amp; Appliances</option>
                </select>
            </div>
            <div class="search-product ads-list">
                <label>按名称搜索</label>
                <div class="search">
                    <div id="custom-search-input">
                    <div class="input-group">
                        <input type="text" class="form-control input-lg" placeholder="Buscar">
                        <span class="input-group-btn">
                            <button class="btn btn-info btn-lg" type="button">
                                <i class="glyphicon glyphicon-search"></i>
                            </button>
                        </span>
                    </div>
                </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <!-- 列表 -->
        <div class="ads-grid">
        <!-- 左侧推荐 -->
            <div class="side-bar col-md-3">
                <div class="w3ls-featured-ads">
                    <h2 class="sear-head fer">推荐商品</h2>
                    <div class="w3l-featured-ad">
                        <a href="single.html">
                            <div class="w3-featured-ad-left">
                                <img src="<?=$image?>/f1.jpg" title="ad image" alt="">
                            </div>
                            <div class="w3-featured-ad-right">
                                <h4>Lorem Ipsum is simply dummy text of the printing industry</h4>
                                <p>$ 450</p>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </div>
                    <div class="w3l-featured-ad">
                        <a href="single.html">
                            <div class="w3-featured-ad-left">
                                <img src="<?=$image?>/f2.jpg" title="ad image" alt="">
                            </div>
                            <div class="w3-featured-ad-right">
                                <h4>Lorem Ipsum is simply dummy text of the printing industry</h4>
                                <p>$ 380</p>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </div>
                    <div class="w3l-featured-ad">
                        <a href="single.html">
                            <div class="w3-featured-ad-left">
                                <img src="<?=$image?>/f3.jpg" title="ad image" alt="">
                            </div>
                            <div class="w3-featured-ad-right">
                                <h4>Lorem Ipsum is simply dummy text of the printing industry</h4>
                                <p>$ 560</p>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- 右侧列表 -->
            <div class="agileinfo-ads-display col-md-9">
                <div class="wrapper">                   
                    <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                        <div id="myTabContent" class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                                <div>
                                <div id="container">
                                    <div style="float: left;padding-top: 3px;">
                                        <h4>商品列表</h4>
                                    </div>
                                    <div class="sort" style="margin-bottom: 10px;">
                                        <div class="sort-by">
                                            <label>按价格排序 : </label>
                                            <select>
                                                <option value="">价格: 价格从低到高</option>
                                                <option value="">价格: 价格从高到低</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <ul class="list">
                                        <a href="single.html">
                                            <li>
                                            <img src="images/m1.jpg" title="" alt="" />
                                            <section class="list-left">
                                            <h5 class="title">There are many variations of passages of Lorem Ipsum</h5>
                                            <span class="adprice">$290</span>
                                            <p class="catpath">Mobile Phones » Brand</p>
                                            </section>
                                            <section class="list-right">
                                            <span class="date">Today, 17:55</span>
                                            <span class="cityname">City name</span>
                                            </section>
                                            <div class="clearfix"></div>
                                            </li> 
                                        </a>
                                        <a href="single.html">
                                            <li>
                                            <img src="images/m2.jpg" title="" alt="" />
                                            <section class="list-left">
                                            <h5 class="title">It is a long established fact that a reader</h5>
                                            <span class="adprice">$310</span>
                                            <p class="catpath">Mobile Phones » Brand</p>
                                            </section>
                                            <section class="list-right">
                                            <span class="date">Today, 17:45</span>
                                            <span class="cityname">City name</span>
                                            </section>
                                            <div class="clearfix"></div>
                                            </li> 
                                        </a>
                                    </ul>
                                </div>
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>
                <ul class="pagination pagination-sm">
                    <li><a href="#">Prev</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">6</a></li>
                    <li><a href="#">7</a></li>
                    <li><a href="#">8</a></li>
                    <li><a href="#">Next</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="goods-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Goods', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'name',
            'classifyId',
            'childClassifyId',
            // 'price',
            // 'desc',
            // 'number',
            // 'images:ntext',
            // 'condition',
            // 'publisherId',
            // 'city',
            // 'viewNum',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
