<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/default.css',
        'asset/plugins/custom/fullcalendar/fullcalendar.bundle.css?v=7.0.3',
        'asset/plugins/custom/jstree/jstree.bundle.css?v=7.0.3',
//        qushildi
        'asset/css/pages/wizard/wizard-1.css?v=7.0.3',

        'asset/plugins/global/plugins.bundle.css?v=7.0.3',
        'asset/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.3',
        'asset/css/style.bundle.css?v=7.0.3',
        'asset/css/themes/layout/header/base/light.css?v=7.0.3',
        'asset/css/themes/layout/header/menu/light.css?v=7.0.3',
        'asset/css/themes/layout/brand/dark.css?v=7.0.3',
        'asset/css/themes/layout/aside/dark.css?v=7.0.3',

        'css/pace.css',

    ];
    public $js = [
        'asset/js/default.js',
        'asset/plugins/global/plugins.bundle.js?v=7.0.3',
        'asset/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.3',
        'asset/js/scripts.bundle.js?v=7.0.3',
//        qushildi
        'asset/js/pages/custom/projects/add-project.js?v=7.0.3',
        'asset/js/pages/crud/forms/validation/form-controls.js?v=7.0.3',

        'asset/js/pages/widgets.js?v=7.0.3',
        'asset/js/pages/crud/forms/widgets/select2.js?v=7.0.3',

        "asset/js/pages/features/miscellaneous/treeview.js?v=7.0.3",
        'asset/plugins/custom/jstree/jstree.bundle.js?v=7.0.3',
        'asset/js/pages/crud/forms/widgets/bootstrap-datepicker.js?v=7.0.6',
        'js/sweetalert.js',

        'js/myjs.js',
        'js/delete.js',
        'js/yii.activeForm.js',
        'js/select2.js',
        'js/pace.js'
    ];

    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}
