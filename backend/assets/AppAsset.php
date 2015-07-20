<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
//        'bootstrap/css/bootstrap.min.css',
        'css/font-awesome.min.css',
        'css/pace.css',
        'css/colorbox/colorbox.css',
        'css/morris.css',
        'css/endless.min.css',
        'css/endless-skin.css',
    ];
    public $js = [
        'bootstrap/js/bootstrap.js',
        'js/pace.min.js',
        'js/modernizr.min.js',
        'js/jquery.popupoverlay.min.js',
        'js/jquery.slimscroll.min.js',
        'js/jquery.cookie.min.js',
//        'js/jquery.flot.min.js',
        'js/rapheal.min.js',
        'js/morris.min.js',
        'js/jquery.colorbox.min.js',
        'js/jquery.sparkline.min.js',
//        'js/endless/endless_dashboard.js',
        'js/endless/endless.js',
        'tinymce/tinymce.js',
        'js/endless/test_tiny.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
