<?php


namespace app\assets;

use yii\web\AssetBundle;

class NiftyAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'http://fonts.googleapis.com/css?family=Roboto:400,700,300,500',
        '/plugins/pace/pace.min.css',
        '/css/bootstrap.min.css',
        '/css/nifty.min.css',
        '/plugins/font-awesome/css/font-awesome.min.css',
        '/plugins/animate-css/animate.min.css',
        '/plugins/morris-js/morris.min.css',
        '/plugins/switchery/switchery.min.css',
        '/plugins/bootstrap-select/bootstrap-select.min.css',
        '/plugins/bootstrap-select/bootstrap-select.min.css',
        '/css/demo/nifty-demo.min.css',
        '/plugins/bootstrap-table/bootstrap-table.min.css',
        '/admin/css/site.css',
    ];


    public $js = [
        //'/js/jquery-2.1.1.min.js',
        '/plugins/pace/pace.min.js',
        '/js/bootstrap.min.js',
        '/js/nifty.min.js',
        '/plugins/fast-click/fastclick.min.js',
        '/plugins/sparkline/jquery.sparkline.min.js',
        '/plugins/morris-js/morris.min.js',
        '/plugins/morris-js/raphael-js/raphael.min.js',
        '/plugins/skycons/skycons.min.js',
        '/plugins/bootstrap-table/bootstrap-table.min.js',
        '/plugins/bootstrap-table/extensions/editable/bootstrap-table-editable.js',
        '/plugins/switchery/switchery.min.js',
		'/js/hc/highcharts-more.js',
		'/js/hc/highcharts.js',
		'/js/hc/highcharts-3d.js',
    ];
    public $depends = [		
        'yii\web\JqueryAsset',
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
