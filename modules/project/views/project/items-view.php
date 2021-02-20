<?php

use app\modules\manuals\models\Contragent;
use app\modules\manuals\models\Regions;
use yii\widgets\DetailView;

/**@var $cp array */

?>
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link" id="2-tab" data-toggle="tab" href="#view-2" aria-controls="view-2">
            <span class="nav-icon">
                <i class="flaticon2-layers-1"></i>
            </span>
            <span class="nav-text"><?= Yii::t('app', "Наименование инициаторов и проектов") ?> <span
                        class="label label-outline-primary"><?= count($cp['2']) ?></span> </span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="3-tab" data-toggle="tab" href="#view-3" aria-controls="view-3">
            <span class="nav-icon">
                <i class="flaticon2-layers-1"></i>
            </span>
            <span class="nav-text"><?= Yii::t('app', "Наименование региона") ?> <span
                        class="label label-outline-primary"><?= count($cp['3']) ?></span> </span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="8-11-tab" data-toggle="tab" href="#view-8-11" aria-controls="view-8-11">
            <span class="nav-icon">
                <i class="flaticon2-layers-1"></i>
            </span>
            <span class="nav-text"><?= Yii::t('app', "Стоимость проекта") ?> <span
                        class="label label-outline-primary"><?= count($cp['8-11']) ?></span> </span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="13-21-tab" data-toggle="tab" href="#view-13-21" aria-controls="view-13-21">
            <span class="nav-icon">
                <i class="flaticon2-layers-1"></i>
            </span>
            <span class="nav-text"><?= Yii::t('app', "Прогноз освоения") ?> <span
                        class="label label-outline-primary"><?= count($cp['13-21']) ?></span> </span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="22-26-tab" data-toggle="tab" href="#view-22-26" aria-controls="view-22-26">
            <span class="nav-icon">
                <i class="flaticon2-layers-1"></i>
            </span>
            <span class="nav-text"><?= Yii::t('app', "Прогноз привлечения") ?> <span
                        class="label label-outline-primary"><?= count($cp['22-26']) ?></span> </span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="file-tab" data-toggle="tab" href="#view-file" aria-controls="view-file">
            <span class="nav-icon">
                <i class="flaticon2-layers-1"></i>
            </span>
            <span class="nav-text"><?= Yii::t('app', "Прикрепленные файлы") ?> <span
                        class="label label-outline-primary"><?= count($cp['file']) ?></span> </span>
        </a>
    </li>
</ul>
<div class="tab-content mt-5" id="myTabContent">
    <div class="tab-pane fade" id="view-2" role="tabpanel" aria-labelledby="2-tab">
        <div class="row">
            <?php
            foreach ($cp['2'] as $modelItem2):
                echo "<div class='col-sm-12 col-md-6 col-lg-4 rounded'>";
                echo DetailView::widget([
                    'model' => $modelItem2,
                    'options' => [
                        'class' => "table"
                    ],
                    'attributes' => [
                        'name',
                        [
                            'attribute' => 'contragent_id',
                            'value' => function ($model) {
                                return Contragent::getContragentById($model->id)['name'] ?? "";
                            }
                        ]
                    ],
                ]);
                echo "</div>";
            endforeach;
            ?>
        </div>
    </div>
    <div class="tab-pane fade" id="view-3" role="tabpanel" aria-labelledby="3-tab">
        <div class="row">
            <?php
            foreach ($cp['3'] as $modelItem3):
                echo "<div class='col-sm-12 col-md-6 col-lg-4 rounded'>";
                echo DetailView::widget([
                    'model' => $modelItem3,
                    'options' => [
                        'class' => "table"
                    ],
                    'attributes' => [
                        [
                            'attribute' => 'region_id',
                            'value' => function ($model) {
                                return Regions::getById($model->id)['name_' . Yii::$app->language] ?? "";
                            }
                        ],
                        [
                            'attribute' => 'district_id',
                            'value' => function ($model) {
                                return Regions::getById($model->id)['name_' . Yii::$app->language] ?? "";
                            }
                        ],
                        'address1',
                        'address2',
                    ],
                ]);
                echo "</div>";
            endforeach;
            ?>
        </div>
    </div>
    <div class="tab-pane fade" id="view-8-11" role="tabpanel" aria-labelledby="8-11-tab">
        <div class="row">
            <?php
            foreach ($cp['8-11'] as $modelItem811):
                echo "<div class='col-sm-12 col-md-6 col-lg-4 rounded'>";
                echo DetailView::widget([
                    'model' => $modelItem811,
                    'options' => [
                        'class' => "table"
                    ],
                    'attributes' => [
                        'own_funds',
                        'fdi',
                        'fund_resources',
                        'bank_loans',
                    ],
                ]);
                echo "</div>";
            endforeach;
            ?>
        </div>
    </div>
    <div class="tab-pane fade" id="view-13-21" role="tabpanel" aria-labelledby="13-21-tab">
        <div class="row">
            <?php
            foreach ($cp['13-21'] as $modelItem1321):
                echo "<div class='col-sm-12 col-md-6 col-lg-4 rounded'>";
                echo DetailView::widget([
                    'model' => $modelItem1321,
                    'options' => [
                        'class' => "table"
                    ],
                    'attributes' => [
                        'assimilation_forecast_year',
                        'assimilation_forecast',
                        'mastered_fact',
                        'cmr',
                        'equipment',
                        'import',
                        'other',
                        'predict_period',
                        'forecast_year',
                    ],
                ]);
                echo "</div>";
            endforeach;
            ?>
        </div>
    </div>
    <div class="tab-pane fade" id="view-22-26" role="tabpanel" aria-labelledby="22-26-tab">
        <div class="row">
            <?php
            foreach ($cp['22-26'] as $modelItem2226):
                echo "<div class='col-sm-12 col-md-6 col-lg-4 rounded'>";
                echo DetailView::widget([
                    'model' => $modelItem2226,
                    'options' => [
                        'class' => "table"
                    ],
                    'attributes' => [
                        'forecast_attracting_finance',
                        'involved_fact',
                        'forecast_period',
                        'forecast_year',
                    ],
                ]);
                echo "</div>";
            endforeach;
            ?>
        </div>
    </div>
    <div class="tab-pane fade" id="view-file" role="tabpanel" aria-labelledby="file-tab">
        <div class="row">
            <?php 
            foreach ($cp['file'] as $modelItemFile):
                $img = "";
                    if (in_array($modelItemFile['attachment']['extension'], ['png','jpg','jpeg','gif','bmp'])) {
                        $img = "/" .$modelItemFile['attachment']['path'];
                    } else if (in_array($modelItemFile['attachment']['extension'], ['doc','docx'])) {
                        $img = "/icon/doc.png";
                    } else if (in_array($modelItemFile['attachment']['extension'], ['mp4','avi','mkv','3gp'])) {
                        $img = "/icon/mp4.png";
                    } else if (in_array($modelItemFile['attachment']['extension'], ['xls','xlsx'])) {
                        $img = "/icon/xls.png";
                    } else if (in_array($modelItemFile['attachment']['extension'], ['txt'])) {
                        $img = "/icon/txt.png";
                    } else if (in_array($modelItemFile['attachment']['extension'], ['pdf'])) {
                        $img = "/icon/pdf.png";
                    } else if (in_array($modelItemFile['attachment']['extension'], ['zip'])) {
                        $img = "/icon/zip.png";
                    } else {
                        $img = "/icon/document.png";
                    }
                ?>
            <div class='col-sm-12 col-md-6 col-lg-4'>
                <div class="card w-100">
                    <div class="card-header">
                        <?= $modelItemFile['attachment']['name']?>
                    </div>
                    <div class="card-body">
                        <img class="m-5" style="max-height: 100px" src="<?= $img?>" alt="<?= $modelItemFile['attachment']['name']?>">
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</div>