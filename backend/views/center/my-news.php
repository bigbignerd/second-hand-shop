<?php
use yii\helpers\Html;
use yii\grid\GridView;
$role = Yii::$app->user->identity->role;
?>

<!-- 发送消息弹出层 -->
<div class="modal fade" id="msg" tabindex="999" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h5 class="modal-title" id="myModalLabel">
                    回复消息
                </h5>
            </div>

            <form name="message" id="msgForm" method="POST">
                <div class="modal-body">
                    <textarea style="width:100%" name="message" id="content" rows="6"></textarea>
                    <input type="hidden" name="sellerId" id="sellerId" value="">
                    <input type="hidden" name="goodsId" id="goodsId" value="">
                    <input type="hidden" name="buyerId" id="buyerId" value="">
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


<div class="container" style="width: 100%;min-height: 300px;">
	<div class="row" style="text-align: center;">
		<h2 class="w3-head">我的消息</h2>
	</div>
	<div class="row" style="padding: 5px 15px;">
		<?php if(!empty($data)):?>
			<?php foreach($data as $g => $msg):?>
				<?php
					if($role == '1'){
						$text = '来自卖家';
					}else{
						$text = '来自买家';
					}
					$text .= '关于产品：'.$msg['goodsInfo']['name'].'的消息';
				?>
				<?php foreach($msg['content'] as $k => $v):?>
					<div class="col-md-12" style="min-height: 40px;line-height: 40px;">
						<div class="col-md-6" style="border-bottom: 1px dotted #ddd"><?=$text?></div>
						<div class="col-md-3" style="border-bottom: 1px dotted #ddd;font-size: 12px;"><?php echo date('Y.m.d H:i',$v['created_at'])?></div>
						<!-- <div class="col-md-1" style="border-bottom: 1px dotted #ddd"><?= ($v['status'] == '0')? "未读" : "已读" ;?></div> -->
						<div class="col-md-3"><a href="javascript:void(0);" class="btn btn-default look">查看</a></div>
						<div class="col-md-9" style="display: none; border:1px solid #ddd">
							<p>消息内容：</p>
							<div class="col-md-12"><?=$v['content']?></div>
							<div class="col-md-12"><a data-toggle="modal" data-target="#msg" class="btn btn-success reply" sellerId="<?=$msg['sellerId']?>" buyerId="<?=$msg['buyerId']?>" goodsId="<?=$msg['goodsId']?>" href="javascript:void(0)">回复</a></div>
						</div>

					</div>
				<?php endforeach;?>
			<?php endforeach;?>
		<?php else:?>
			<div><h2>暂无消息</h2></div>
		<?php endif;?>
	</div>
</div>
<?= $this->registerJs('
	$(".look").click(function(){
		var target = $(this).parent().next("div");
		if(target.is(":hidden")){
			target.show();
			$(this).text("收起");
		}else{
			target.hide();
			$(this).text("查看");
		}
	});
	$(".reply").click(function(){
		var field = ["sellerId","buyerId","goodsId"];
		for(var i in field){
			$("#"+field[i]).val($(this).attr(field[i]));
		}
		//绑定发送消息
		bindReply();
	});

	function bindReply(){
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
	}
')?>