<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */

/* @var $exception Exception */
$this->title = $name;

use yii\helpers\Html;
use yii\helpers\Url;

?>

<div class="col-xxl-8 order-2 order-xxl-1">
    <div class="card card-custom card-stretch gutter-b">
        <div class="card-body pt-4 pb-1 pl-4 pr-4">
            <div class="d-flex flex-column flex-root">
                <!--begin::Error-->
                <div class="d-flex flex-row-fluid flex-column bgi-size-cover bgi-position-center bgi-no-repeat p-10 p-sm-30" style="background-image: url(<?= Url::base() ?>/web/asset/media/error/bg1.jpg);">
                    <!--begin::Content-->
                    <h1 class="font-weight-boldest text-dark-75 mt-15" style="font-size: 10rem">
                        <?=substr($name, strpos($name, '(')+1, 4); ?>
                    </h1>
                    <p class="font-size-h3 text-danger font-weight-bolder">
                        <?= nl2br(Html::encode($message)) ?>
                    </p>
                    <!--end::Content-->
                </div>
                <!--end::Error-->
            </div>
        </div>
    </div>
</div>
