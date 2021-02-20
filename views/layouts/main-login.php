<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\FrontAsset;
use yii\helpers\Url;
FrontAsset::register($this);
$message = message();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?= Url::base() ?>/asset/media/logos/favicon.ico"/>
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

        <?= $content ?>

<!--<script>some error code;</script>-->
<!--<script>alert('after content');</script>-->
<?php

// echo "<pre>";print_r($message);die;
$status = $message['status'];
$message = $message['message'];
$js = <<<JS
    // alert(123)
    // some error code in jquery;
    let messages = '$message';
    let status = '$status';
    // alert(status);
    if (status !== 'false') {
    	console.log(messages);
        Swal.fire(messages, status, status);
    }
JS;

$this->registerJsFile("/js/sweetalert/sweetalert.js", ['depends' => "yii\bootstrap\BootstrapAsset"]);
//$this->registerJsFile("/js/sweetalert/sweetalert.js", ['depends' => "yii\bootstrap\BootstrapPluginAsset"]);
//$this->registerJs($js);
$this->registerJs($js, \yii\web\View::POS_LOAD);
?>
<?php $this->endBody() ?>

<!--<script>alert('before end');</script>-->
</body>
</html>
<?php $this->endPage() ?>

