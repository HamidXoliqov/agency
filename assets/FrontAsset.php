<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class FrontAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'css/site.css',
        'https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700',
        'asset/css/pages/login/classic/login-4.css?v=7.0.3',
        'asset/plugins/global/plugins.bundle.css?v=7.0.3',
        'asset/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.3',
        'asset/css/style.bundle.css?v=7.0.3',
        'asset/css/themes/layout/header/base/light.css?v=7.0.3',
        'asset/css/themes/layout/header/menu/light.css?v=7.0.3',
        'asset/css/themes/layout/brand/dark.css?v=7.0.3',
        'asset/css/themes/layout/aside/dark.css?v=7.0.3',
    ];
    public $js = [
        'asset/plugins/global/plugins.bundle.js?v=7.0.3',
        'asset/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.3',
        'asset/js/scripts.bundle.js?v=7.0.3',
//        'asset/js/pages/custom/login/login-general.js?v=7.0.3',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
