<?php 
namespace backend\widget;

use yii;
use yii\helpers\Html;
use yii\base\InvalidCallException;
use yii\base\Widget;
use yii\helpers\ArrayHelper;
/**
 * Uploadify上传组件，上传目录分类待确定、待完善upload.php
 * 所有文件的根目录 /public/upload
 *
 * 具体视频 图片再进行分类，使用组件至少需要指定绑定的targetId
 * @example
 * <?= Uploadify::widget(['targetId'=>'pic','multi'=>'false'])?>
 * 
 * 指定上传文件夹 classify :头像=>'avatar',视频封面=>'logo','视频'=>'video'
 */
class Uploadify extends Widget {

	/** 绑定的上传input id */
	public $targetId = '';
	/** 是否多文件上传  */
	public $multi = 'false';
	/** 
	 * 上传文件所属分类
	 * @var 具体分类待定
	 */
	public $classify = 'image';
	/**  上传的是否为食品  */
	public $isVideo  = false;

	public $buttonText = '选择图片';
	/** 上传按钮的宽度 */
	public $width = 120;
	/** 上传按钮的高度 */
	public $height = 40;
	/** 文件上传大小限制 */
	public $fileSizeLimit = '2MB';
	/** 绑定上传按钮的 input hidden id */
	public $hiddenInputId = 'upload';

	public function  init()
	{

		$width = ini_get('width');
		$multi  = ini_get('multi');
		$height = ini_get('height');

		$isVideo = ini_get('isVideo');
		$targetId = ini_get('targetId');
		$classify = ini_get('classify');
		$buttonText = ini_get('buttonText');

		$fileSizeLimit = ini_get('fileSizeLimit');
		$hiddenInputId = ini_get('hiddenInputId');

		parent::init();
	}

	public function run()
	{
		/** 不同类目文件存在目录，根据classify生成真实具体的路径 */

		$category = ['avatar'=>'avatar','video'=>'video','logo'=>'logo'];
		$view = $this->getView();

		$view->registerCssFile(Yii::getAlias('@plugin').'/uploadify/uploadify.css',['position' => \yii\web\View::POS_HEAD]);
		$view->registerJsFile(Yii::getAlias('@plugin').'/uploadify/jquery.uploadify.js',['position' => \yii\web\View::POS_END]);

		echo '<input type="hidden" id="'.$this->hiddenInputId.'" />';

		/** 插件目录 */
		$swf = Yii::getAlias('@plugin').'/uploadify/uploadify.swf';
		$uploader = '/public/plugins/uploadify/uploadify.php';
		// $uploader = Yii::getAlias('@plugin').'/uploadify/uploadify.php';

		if($this->isVideo){
			$fileTypeExts = "*.mp4;";
		}else{
			$fileTypeExts = "*.jpg;*.png;*.gif;";
		}
		$view->registerJs('
			$("#'.$this->hiddenInputId.'").uploadify({
				"onSelect" : function(file){
	                filetype = file.type;
	            },
	            "auto":true,
	            "swf"      : "'.$swf.'",
	            "uploader" : "'.$uploader.'",
	            "buttonText":"'.$this->buttonText.'",
	            "method"   : "POST",
	            "formData" : { "path": "'.$category[$this->classify].'" },
	            "multi" : '.$this->multi.',
	            "height":'.$this->height.',
	            "width":'.$this->width.',
	            "fileSizeLimit" : "'.$this->fileSizeLimit.'",
	            "fileTypeExts" : "'.$fileTypeExts.'",
	            "onUploadStart" : function(){
	                $(".uploadify-queue").css("width","280px");
	            },
	            "onUploadSuccess" : function(file, url, response) {
					if(url == "0"){
						alert("上传出错");
						return;
					}else{
						var data = $.parseJSON(url);
						var oldValue = $("#'.$this->targetId.'").val();
						if(oldValue != ""){
							$("#'.$this->targetId.'").val(oldValue+","+data.fileName);
						}else{
							$("#'.$this->targetId.'").val(data.fileName);
						}
						
					}
                },
	            "onSelectError" : function(file,errorCode,errorMsg) {
					switch (errorCode) {
						case SWFUpload.QUEUE_ERROR.INVALID_FILETYPE:
							this.queueData.errorMsg = "上传图片格式不合法";
							break;
						case SWFUpload.QUEUE_ERROR.FILE_EXCEEDS_SIZE_LIMIT:
							this.queueData.errorMsg = "上传尺寸最大"+this.settings.fileSizeLimit;
							break;
					}
				}
			});
		');

	}
}






