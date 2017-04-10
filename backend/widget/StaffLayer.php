<?php
namespace backend\widget;
use yii;
use yii\helpers\Html;
use yii\base\InvalidCallException;
use yii\base\Widget;

class StaffLayer extends Widget
{
	public $fieldName;
	public $value;
	public $model;
	public $attribute;
	public $contentOptions;

	public $id;

	public function init()
	{
		parent::init();
	}

	public function run()
	{
		$view  = $this->getView();
		$view->registerJs('
			var url = "'.Yii::$app->urlManager->createAbsoluteUrl(["layer/staff"]).'";
			var targetId = "#'.$this->id.'";
			//加载url信息
			$(targetId).click(function(){
				$("#modalBody").load(url);
				$("#staffLayer").modal(true);
			});
			//确认选择
			$("#confirm").click(function(){
				var name = "";
				var ids  = "";
				$("#staffLayer input:checked[name=userId]").each(function(){
					var tr = $(this).parents("tr");
                    if(ids != ""){
                        ids  += ",";
                        name += ",";
                    }
                    ids += $(this).val();
                    name += $.trim(tr.find("td").eq(1).text());
				});
				if(name != ""){
					$(targetId).removeAttr("readonly").val(name).attr("readonly", "readonly");
					//关闭模态框
					$("#staffLayer").modal("hide");
					//赋值
					$(targetId).val(name);
					//添加新的input
                    $("<input type=\'hidden\' name=\'"+$(targetId).attr("name")+"\' value=\'"+ids+"\' />").insertAfter($(targetId).parent());
				}else{
					alert("请选择相关负责人");
					return ;
				}
			});
		');
		return $this->render("@backend/views/layer/staffModal");
	}

	protected function htmlTemplate($data)
	{

	}
}
?>