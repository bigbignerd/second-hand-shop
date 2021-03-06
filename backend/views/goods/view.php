<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Goods */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Goods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$image = Yii::getAlias("@imgPath");
$upload = Yii::getAlias("@upload");
$jsPath = Yii::getAlias("@jsPath");
if(Yii::$app->user->identity->id){
    $isLogin = '1';
    $userId = Yii::$app->user->identity->id;
    $userName = Yii::$app->user->identity->username;
    $role = Yii::$app->user->identity->role;
}else{
    $isLogin = '0';
    $userName = '';
    $userId = 0;
    $role = 1;
}
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
    textarea{
        width: 100%;
        border: 1px solid #ddd;
        padding: 20px;
        resize: vertical;
        outline: none;
    }
    .p_0{
        padding-left: 0px;
    }
</style>
<!-- 购买商品弹出层 -->
<div class="modal fade" id="buy" tabindex="999" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h5 class="modal-title" id="myModalLabel">
                    请填写地址信息
                </h5>
            </div>
            <?php $form = ActiveForm::begin(); ?>

            <div class="modal-body">
                
                <?=$form->field($orderModel, "name")->textInput()?>

                <?=$form->field($orderModel, "phone")->textInput()?>

                <?=$form->field($orderModel, "address")->textInput()?>
                
                <input type="hidden" name="Order[sellerId]" value="<?=$model->publisherId?>">
                <input type="hidden" name="Order[goodsId]" value="<?=$model->id?>">
                <input type="hidden" name="Order[buyerId]" value="<?=$userId ?>">
            </div>
            <div><span style="color:green">请提前与卖家确认支付方式</span></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                </button>
                <!-- <button type="button" class="btn btn-default">
                    提交订单
                </button> -->
                <?= Html::submitButton('提交订单', ['class' => 'btn btn-default']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
<!-- 发送消息弹出层 -->
<div class="modal fade" id="msg" tabindex="999" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h5 class="modal-title" id="myModalLabel">
                    发送消息给<?= \common\models\User::nameById($model->publisherId)?>
                </h5>
            </div>

            <form name="message" id="msgForm" method="POST">
                <div class="modal-body">
                    <textarea name="message" id="content" rows="6"></textarea>
                    <input type="hidden" name="sellerId" value="<?=$model->publisherId?>">
                    <input type="hidden" name="goodsId" value="<?=$model->id?>">
                    <input type="hidden" name="buyerId" value="<?=$userId ?>">
                    <input type="hidden" name="type" value="<?=$role ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <a id="sendMsg" href="javascript:void(0);" class="btn btn-default">发送</a>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
<!-- 导航 -->
<div class="w3layouts-breadcrumbs text-center">
    <div class="container">
        <span class="agile-breadcrumbs">
        <a href="/"><i class="fa fa-home home_1"></i></a> / 
        <a href="<?=Yii::$app->urlManager->createAbsoluteUrl(['goods/index'])?>">商品</a> / 
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
                        <?php
                            $imgUrl = explode(",", $model->images);
                        ?>
                        <?php foreach($imgUrl as $k => $v):?>
                            <li data-thumb="<?=$upload?>/<?=$v?>" class="clone" aria-hidden="true" style="width: 625px; float: left; display: block;">
                                <img style="height: 300px;object-fit: cover;" src="<?=$upload?>/<?=$v?>" draggable="false">
                            </li>
                        <?php endforeach;?>
                        </ul>
                    </div>
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
                    <h4><span class="w3layouts-agileinfo">浏览 </span> : <strong><?=$model->viewNum?></strong></h4>
                    <h4><span class="w3layouts-agileinfo">数量 </span> : <?=$model->number?>&nbsp;个</h4>
                    <h4><span class="w3layouts-agileinfo">描述</span> :<p><?=$model->desc?></p><div class="clearfix"></div></h4>
                </div>
                <!-- 用户留言 -->
                <div class="product-details" style="margin-top: 20px;">
                    <div class="col-md-3" style="height: 40px;line-height:40px;background-color: #ffda44;text-align: center;"><b>用户留言</b></div>
                    <div class="col-md-12 p_0" style="margin-top: 20px"> 
                        <textarea rows="4" id="comment-cnt"></textarea>
                    </div>
                    <div class="col-md-12 p_0">
                        <a href="javascript:void(0);" id="comment" class="post-w3layouts-ad">发布</a>
                    </div>
                    <div class="col-md-12 p_0">
                        <h4>留言内容:</h4>
                    </div>
                    <div class="col-md-12" style="padding: 0px" id="user-comment-list">
                        <?php
                        if(!empty($comment)):
                            foreach ($comment as $k => $v):
                         ?>
                                <div class="col-md-12 comment">
                                    <div class="cnt"><span><?=$v['username']?></span><?=$v['comment']?></div>
                                    <div class="time"><?=date('Y.m.d H:i',$v['created_at'])?></div>
                                </div>
                        <?php
                            endforeach;
                        ?>
                        <?php else:?>
                            <div class="col-md-12 comment" id="no-comment">
                                <h3>暂无评价信息</h3>
                            </div>
                        <?php endif;?>
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
                <div class="item-price" style="padding-left:0px;padding-right:0px;border: none;text-align: center;padding-top: 15px;">
                    <?php if($model->number > 0):?>
                    <a style="width: 100%;" data-toggle="modal" data-target="#buy" class="btn btn-success">立即预约购买</a>
                    <?php else:?>
                    <button style="width: 100%;" class="btn">已经出售</button>
                    <?php endif;?>
                </div>
                <div class="interested text-center">
                    <?php
                        if($sellerOnline):
                    ?>
                        <h4>卖家在线<small><a data-toggle="modal" data-target="#msg" href="javascript:void(0);">点击咨询卖家</a></small></h4>
                    <?php else:?>
                        <h4>卖家暂时不在 <small>左下角可以留言</small></h4>
                    <?php endif;?>
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
<script type="text/javascript">
    function currentTime(){
        var d = new Date(),str = '';
        str += d.getFullYear()+'.';
        str += d.getMonth() + 1+'.';
        str += d.getDate()+' ';
        str += d.getHours()+':'; 
        str += d.getMinutes();
        return str;
    }
    function addComment(content)
    {
        //隐藏暂无评论
        $("#no-comment").hide();

        var html  = '<div class="col-md-12 comment">';
            html += '<div class="cnt"><span>'+"<?=$userName?>"+'</span>';
            html += content;
            html += '</div>';
            html += '<div class="time">'+currentTime()+'</div>';
            html += '</div>';
        $("#user-comment-list").prepend(html);
        html = '';
        return true;
    }
</script>
<?php $this->registerJs('
    $("#comment").click(function(){

        var content = $("#comment-cnt").val();

        var isLogin = '.$isLogin.';
        if(!isLogin){
            alert("请先登录，再进行评论");
            return false;
        }
        if(content == ""){
            alert("请输入评价内容");
            return false;
        }else{
            var postUrl  = "'.Yii::$app->urlManager->createAbsoluteUrl(["comment/add"]).'";
            var postData = {
                "comment" : content,
                "goodsId" : "'.$id.'",
            };
            $.post(postUrl, postData, function(res){
                var res = $.parseJSON(res);
                if(res.errno == 0){
                    addComment(content);
                    alert(res.errmsg);
                }else{
                    alert(res.errmsg);
                    return;
                }
            });
        }
    });
    $("#sendMsg").click(function(){
        var content = $("#content").val();
        if(content == ""){
            alert("请输入发送内容");
            return ;
        }
        var message = $("#msgForm").serialize();
        var msgUrl = "'.Yii::$app->urlManager->createAbsoluteUrl(["goods/send-msg"]).'";
        $.post(msgUrl, message, function(res){
            var resp = $.parseJSON(res);
            if(resp["errno"] == "0"){
                $("#msg").modal("hide");
                alert("发送成功");
            }else{
                alet("发送失败");
                return ;
            }
        });
    });
')?>
