<?php
$img = Yii::getAlias('@imgPath').'/img/';
$js  = Yii::getAlias("@jsPath");
$isLogin = (isset(Yii::$app->user->identity->id))? 1 : 0;
$role = Yii::$app->user->identity->role;
if(isset($role) && $role == 2){
    $isSeller = 1;
}else{
    $isSeller = 0;
}
?>
<script type="text/javascript" src="<?=$js?>/jquery-1.10.2.js"></script>
<header>
    <div class="w3ls-header"><!--header-one--> 
        <div class="w3ls-header-left">
            <p><a href="###"><i class="fa fa-bell" aria-hidden="true"></i> 欢迎来到闲置商品发布平台 </a></p>
        </div>
        <div class="w3ls-header-right">
            <ul>
                <li class="dropdown head-dpdn">
                    <?php
                        if(Yii::$app->user->identity->id){
                            $text = Yii::$app->user->identity->username;
                            $url = Yii::$app->urlManager->createAbsoluteUrl(['center/index']);
                            $logout = true;
                        }else{
                            $text = '登陆';
                            $url = Yii::$app->urlManager->createAbsoluteUrl(['site/login']);
                            $logout = false;
                        }
                    ?>
                    <a href="<?=$url?>" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i><?=$text?></a>
                    <?php if($logout):?>
                        <a href="<?=Yii::$app->urlManager->createAbsoluteUrl(['site/logout'])?>" aria-expanded="false">退出</a>
                    <?php endif;?>
                </li>
                <li class="dropdown head-dpdn">
                    <a href="<?=Yii::$app->urlManager->createAbsoluteUrl(['site/signup'])?>" aria-expanded="false">
                        <i class="fa fa-align-justify" aria-hidden="true"></i>注册
                    </a>
                </li>
                <!-- <li class="dropdown head-dpdn">
                    <a href="###"><i class="fa fa-question-circle" aria-hidden="true"></i> 关于</a>
                </li> -->
                <!-- <li class="dropdown head-dpdn">
                    <a href="#"><span class="active uls-trigger"><i class="fa fa-language" aria-hidden="true"></i>languages</span></a>
                </li> -->
            </ul>
        </div>
        
        <div class="clearfix"> </div> 
    </div>
    <div class="container">
        <div class="agile-its-header">
            <div class="logo">
                <h1><a href="/"><span>闲置</span>购</a></h1>
            </div>
            <div class="agileits_search">
                <input name="Search" type="text" placeholder="搜索你需" required="" />
                <button type="btn" id="search" class="btn btn-default" aria-label="Left Align">
                    <i class="fa fa-search" aria-hidden="true"> </i>
                </button>
            <a class="post-w3layouts-ad" id="publish-g" href="javascript:void(0);" toUrl="<?=Yii::$app->urlManager->createAbsoluteUrl(['center/publish-goods'])?>">发布闲置</a>
            <a class="post-w3layouts-ad" style="margin-right: 10px;"  href="<?=Yii::$app->urlManager->createAbsoluteUrl(['goods/index'])?>">全部商品</a>

            </div>  
            <div class="clearfix"></div>
        </div>
    </div>
</header>
<?= $this->registerJs('
    $("#search").click(function(){
        var searchContent = $("input[name=\"Search\"]").val();

        if(searchContent == ""){
            alert("请输入搜索内容");
            return false;
        }else{
            var newUrl = "'.Yii::$app->urlManager->createAbsoluteUrl(["goods/index"]).'?GoodsSearch[title]="+searchContent;
            window.location.href = newUrl;
        }
    });
    var isLogin = "'.$isLogin.'";
    var isSeller = "'.$isSeller.'";
    
    $("#publish-g").click(function(){
        if(isLogin == 0){
            alert("请先登录");
            return ;
        }
        if(isSeller == 0){
            alert("请注册卖家账号");
            return ;
        }
        if(isLogin == 1 && isSeller == 1){
            window.location.href = $("#publish-g").attr("toUrl");
        }
    });
')?>
