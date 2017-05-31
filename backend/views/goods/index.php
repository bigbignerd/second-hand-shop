<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;

$image = Yii::getAlias("@imgPath");
$upload = Yii::getAlias("@upload");
/* @var $this yii\web\View */
/* @var $searchModel backend\models\GoodsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Goods';
$this->params['breadcrumbs'][] = $this->title;
?>
<style type="text/css">
    .ads-list label{
        color: #fff;
    }
    .ads-list select{
        color: #666;
    }
</style>
<!-- 导航 -->
<div class="w3layouts-breadcrumbs text-center">
    <div class="container">
        <span class="agile-breadcrumbs">
        <a href="/"><i class="fa fa-home home_1"></i></a> / 
        <a href="/goods/index">商品</a> / 
        <span>列表</span></span>
    </div>
</div>
<div class="total-ads main-grid-border" style="background-color: #fff;">
    <div class="container">
        <!-- 搜索选择框 -->
        <div class="select-box" style="background-color: #f6f6f6">
            <div class="browse-category ads-list">
                <label>城市</label>
                <select class="form-control" style="border-radius: 0" id="city"> 
                    <option value="">按城市搜索</option>    
                    <option value="北京">北京</option>
                    <option value="天津">天津</option>             
                    <option value="上海">上海</option>             
                </select>
            </div>
            <div class="browse-category ads-list">
                <label>分类</label>
                <select class="form-control" tabindex="-98" id="classify">
                    <option value="">按分类搜索</option>   
                    <?php foreach($searchModel->mainClassify as $key => $v):?>
                      <option value="<?=$key?>"><?=$v?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="search-product ads-list">
                <label>按名称搜索</label>
                <div class="search">
                    <div id="custom-search-input">
                    <div class="input-group">
                        <input type="text" name="goodsName" class="form-control input-lg" placeholder="输入商品名称">
                        <span class="input-group-btn">
                            <button id="searchName" class="btn btn-info btn-lg" type="button">
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
                    <?php 
                        if(!empty($recommend)):
                            foreach ($recommend as $k => $rec) :
                    ?>
                        <div class="w3l-featured-ad">
                            <a href="<?=Yii::$app->urlManager->createAbsoluteUrl(['goods/view','id'=>$rec['id']])?>">
                                <div class="w3-featured-ad-left">
                                <?php
                                    $img = explode(",", $rec['images']);
                                    if(!empty($img) && isset($img[0])){
                                        $recimgUrl = $upload.'/'.$img[0];
                                    }else{
                                        $recimgUrl = '';
                                    }
                                ?>
                                    <img src="<?=$recimgUrl?>" title="ad image" alt="">
                                </div>
                                <div class="w3-featured-ad-right">
                                    <h4><?=$rec['title']?></h4>
                                    <p>￥ <?=$rec['price']?></p>
                                </div>
                                <div class="clearfix"></div>
                            </a>
                        </div>
                        <?php endforeach;?>
                    <?php endif;?>
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
                                            <select id="price">
                                                <option value="price">价格: 价格从低到高</option>
                                                <option value="-price">价格: 价格从高到低</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <ul class="list">
                                    <?php foreach($allData as $kk => $goods):?>
                                        <a href="<?=Yii::$app->urlManager->createAbsoluteUrl(['goods/view','id'=>$goods['id']])?>">
                                            <li>
                                            <?php
                                                $goodsImage = explode(",", $goods['images']);
                                                if(!empty($goodsImage) && isset($goodsImage[0])){
                                                    $imgUrl = $upload.'/'.$goodsImage[0];
                                                }else{
                                                    $imgUrl = '';
                                                }
                                            ?>
                                            <img src="<?=$imgUrl?>" title="" alt="" />
                                            <section class="list-left">
                                                <h5 class="title"><?=$goods['title']?></h5>
                                                <span class="adprice">$<?=$goods['price']?></span>
                                                <p class="catpath">全部 » <?=$searchModel->mainClassify[$goods['classifyId']]?></p>
                                            </section>
                                            <section class="list-right">
                                            <span class="date"><?php echo date('Y.m.d H:i', $goods['created_at'])?></span>
                                            <span class="cityname"><?=$goods['city']?></span>
                                            </section>
                                            <div class="clearfix"></div>
                                            </li> 
                                        </a>
                                    <?php endforeach;?>
                                    </ul>
                                </div>
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>
                <div>
                    <?php echo LinkPager::widget(['pagination'=>$dataProvider->pagination]); ?>
                </div>
                <!-- <ul class="pagination pagination-sm">
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
                </ul> -->
            </div>
        </div>
    </div>
</div>
<?php $this->registerJs('
    var baseUrl = "'.Yii::$app->urlManager->createAbsoluteUrl(["goods/index"]).'";
    /** 按城市搜索 */
    $("#city").change(function(){
        var city = $(this).children("option:selected").val();
        window.location.href = baseUrl+"?GoodsSearch[city]="+city;
    });
    /** 按分类搜索 */
    $("#classify").change(function(){
        var classifyId = $(this).children("option:selected").val();
        window.location.href = baseUrl+"?GoodsSearch[classifyId]="+classifyId;
    });
    /** 按价格搜索 */
    $("#price").change(function(){
        var price = $(this).children("option:selected").val();
        window.location.href = baseUrl+"?sort="+price;
    });
    /** 按名称搜索 */
    $("#searchName").click(function(){
        var searchContent = $("input[name=\"goodsName\"]").val();

        if(searchContent == ""){
            alert("请输入搜索内容");
            return false;
        }else{
            var newUrl = "'.Yii::$app->urlManager->createAbsoluteUrl(["goods/index"]).'?GoodsSearch[title]="+searchContent;
            window.location.href = newUrl;
        }
    })
')?>

