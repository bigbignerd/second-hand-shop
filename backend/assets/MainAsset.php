<?php
namespace backend\assets;
use backend\assets\AppAsset;

class MainAsset extends AppAsset
{
	public $basePath = '@webroot';
    public $baseUrl = '@web/public';
    public $css = [
        // 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css',
        'css/bootstrap-select.css',
        'css/style.css',
        'css/flexslider.css',
        'css/font-awesome.min.css',
        'css/menu_sideslide.css',
        'css/jquery.uls.css',
        'css/jquery.uls.grid.css',
        'css/jquery.uls.lcd.css',
    ];
    public $js = [
    	// 'js/main.js',
    	'js/classie.js',
    	'js/bootstrap-select.js',
    	'js/jquery.leanModal.min.js',
    	'js/jquery.uls.data.js',
    	'js/jquery.uls.data.utils.js',
    	'js/jquery.uls.lcd.js',
    	'js/jquery.uls.languagefilter.js',
        'js/jquery.uls.regionfilter.js',
    	'js/jquery.uls.core.js',
        'js/jquery.flexisel.js',
        'js/responsiveslides.min.js',
        'js/move-top.js',
        'js/easing.js',
        'js/bootstrap.js'
    ];

}
?>