<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JqueryAsset;

$i = 0;
/* @var $this yii\web\View
 * @var app\modules\manuals\models\ItemReferencesSearch;
 * @var $dataProvider yii\data\ActiveDataProvider
 * @var $model
 */


$this->title = Yii::t('app', 'References');

$unit = strtolower($model[0]['name_uz']);
if ($unit) {
    $this->params['breadcrumbs'][] = $this->title = strtoupper($unit);
} else {
    $this->params['breadcrumbs'][] = $this->title;
}

?>
<div class="card card-custom">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
            <a href="<?= Url::to(['references-type/index']) ?>"
               class="btn btn-sm btn-success font-weight-bolder">
                        <span class="svg-icon svg-icon-md">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path d="M8.42034438,20 L21,20 C22.1045695,20 23,19.1045695 23,18 L23,6 C23,4.8954305 22.1045695,4 21,4 L8.42034438,4 C8.15668432,4 7.90369297,4.10412727 7.71642146,4.28972363 L0.653241109,11.2897236 C0.260966303,11.6784895 0.25812177,12.3116481 0.646887666,12.7039229 C0.648995955,12.7060502 0.651113791,12.7081681 0.653241109,12.7102764 L7.71642146,19.7102764 C7.90369297,19.8958727 8.15668432,20 8.42034438,20 Z" fill="#000000" opacity="0.3"/>
                                    <path d="M12.5857864,12 L11.1715729,10.5857864 C10.7810486,10.1952621 10.7810486,9.56209717 11.1715729,9.17157288 C11.5620972,8.78104858 12.1952621,8.78104858 12.5857864,9.17157288 L14,10.5857864 L15.4142136,9.17157288 C15.8047379,8.78104858 16.4379028,8.78104858 16.8284271,9.17157288 C17.2189514,9.56209717 17.2189514,10.1952621 16.8284271,10.5857864 L15.4142136,12 L16.8284271,13.4142136 C17.2189514,13.8047379 17.2189514,14.4379028 16.8284271,14.8284271 C16.4379028,15.2189514 15.8047379,15.2189514 15.4142136,14.8284271 L14,13.4142136 L12.5857864,14.8284271 C12.1952621,15.2189514 11.5620972,15.2189514 11.1715729,14.8284271 C10.7810486,14.4379028 10.7810486,13.8047379 11.1715729,13.4142136 L12.5857864,12 Z" fill="#000000"/>
                                </g>
                            </svg>
                        </span>
                <?= Yii::t('app', 'Back') ?></a>
        </div>
        <div class="card-toolbar">
            <!--begin::Dropdown-->
            <!--end::Dropdown-->
            <!--begin::Button-->
            <button href="<?= Url::to(['create', 'references_type_id' => $model[0]['references_type_id']]) ?>"
                    class="btn btn-sm btn-primary font-weight-bolder view-modal-show">
                    <span class="svg-icon svg-icon-md">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                             height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <circle fill="#000000" cx="9" cy="15" r="6"/>
                                <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                      fill="#000000" opacity="0.3"/>
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span><?= Yii::t('app', 'Create') ?></button>
            <!--end::Button-->
        </div>
    </div>
    <br>
    <div class="separator separator-solid"></div>
    <div class="card-body">
        <div class="table-responsive">
        <!--begin: Datatable-->
        <table class="table table-bordered table-condensed table-hover" id="kt_datatable">
            <thead>
            <tr>
                <th  style="width: 50px!important;" title="id">#</th>
                <th><?= Yii::t('app', 'Name') ?></th>
                <th><?= Yii::t('app', 'Sort') ?></th>
                <th><?= Yii::t('app', 'Status') ?></th>
                <th style="width: 90px!important;"><?= Yii::t('app', 'Action') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php if (!empty($models)) : ?>
                <?php foreach ($models as $key): ?>
                    <tr>
                        <td><?= ++$i ?></td>
                        <td><?= $key["name_" . Yii::$app->language] ?></td>
                        <td><?= $key['sort'] ?></td>
                        <td><?php
                            if ($key['status'] === 1) {
                                echo $key['status'];
                            } else if ($key['status'] === 2) {
                                echo 2;
                            }
                            ?>
                        </td>
                        <td>
                            <a href="<?= Url::to(['update', 'id' => $key['id']]) ?>" class="btn btn-icon btn-xs btn-outline-primary update-one">
                                <i class="la la-pencil-square-o"></i>
                            </a>
                            <a href="<?= Url::to(['view', 'id' => $key['id']]) ?>" class="btn btn-icon btn-xs btn-outline-info view-one">
                                <i class="la la-eye"></i>
                            </a>

                            <?= Html::a('<i class="la la-trash"></i>', ['references/delete', 'id' => $key['id']], [
                                'title' => Yii::t('app', 'Delete'),
                                'class' => "btn btn-icon btn-xs btn-outline-danger delete-button",
                                'data-id' => Yii::$app->language
                            ]); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
        <!--end: Datatable-->
        </div>
    </div>
</div>
<button class="offcanvas" id="kt_demo_panel_toggle">sa</button>
<?php
$js = <<<JS
$('body').delegate('.update-one', 'click', function(e) {
    e.preventDefault();
    let url=$(this).attr('href');
    $('#kt_demo_panel_toggle').click(); 
    $('.right-modal-all').load(url); 
});
$('body').delegate('.view-one', 'click', function(e) {
    e.preventDefault();
    let url=$(this).attr('href');     
    $('#kt_demo_panel_toggle').click(); 
    $('.right-modal-all').load(url); 
});
JS;
$this->registerJs($js);

$this->registerJsFile('@web/asset/js/pages/crud/ktdatatable/base/html-table.js?v=7.0.3', ['depends' => [JqueryAsset::className()]]);
?>


