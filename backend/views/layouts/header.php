<?php
$img = Yii::getAlias('@imgPath').'/img/';
$js  = Yii::getAlias("@jsPath");
?>
<script type="text/javascript" src="<?=$js?>/jquery-1.10.2.js"></script>
<header>
    <div class="w3ls-header"><!--header-one--> 
        <div class="w3ls-header-left">
            <p><a href="###"><i class="fa fa-bell" aria-hidden="true"></i>Welcome to resale </a></p>
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
                <li class="dropdown head-dpdn">
                    <a href="###"><i class="fa fa-question-circle" aria-hidden="true"></i> 关于</a>
                </li>
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
                <h1><a href="/"><span>Re</span>sale</a></h1>
            </div>
            <div class="agileits_search">
                <form action="#" method="post">
                    <input name="Search" type="text" placeholder="搜索你需" required="" />
                    <!-- <select id="agileinfo_search" name="agileinfo_search" required="">
                        <option value="">All Categories</option>
                        <option value="Mobiles">Mobiles</option>
                        <option value="Electronics & Appliances">Electronics & Appliances</option>
                        <option value="Cars">Cars</option>
                        <option value="Bikes">Bikes</option>
                        <option value="Furnitures">Furnitures</option>
                        <option value="Books, Sports & Hobbies">Books, Sports & Hobbies</option>
                        <option value="Fashion">Fashion</option>
                        <option value="Kids">Kids</option>
                        <option value="Services">Services</option>
                        <option value="Jobs">Jobs</option>
                        <option value="Real Estates">Real Estates</option>
                    </select> -->
                    <button type="submit" class="btn btn-default" aria-label="Left Align">
                        <i class="fa fa-search" aria-hidden="true"> </i>
                    </button>
                </form>
            <a class="post-w3layouts-ad" href="<?=Yii::$app->urlManager->createAbsoluteUrl(['center/publish-goods'])?>">发布闲置</a>
            </div>  
            <div class="clearfix"></div>
        </div>
    </div>
</header>
