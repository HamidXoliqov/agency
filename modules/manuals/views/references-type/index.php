<?php

use yii\helpers\Url;

$i = 0;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\manuals\models\ReferencesTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $models */

$this->title = Yii::t('app', 'ReferencesType');
$this->params['breadcrumbs'][] = $this->title;

?>

 <div class="card card-custom">
    <div>
        <br>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-condensed table-hover">
            <thead>
            <tr>
                <th title="Field #1">№</th>
                <th title="Field #2" style="text-align: center"><?= Yii::t('app', 'Name') ?></th>
                <th title="Field #3" style="text-align: center"><?= Yii::t('app', 'Code') ?></th>
                <th title="Field #4" style="text-align: center"><?= Yii::t('app', 'References') ?></th>
                <th title="Field #5" style="text-align: center"><?= Yii::t('app', 'Action') ?></th>
            </tr>
            </thead>

            <tbody>
            <?php foreach ($models as $key): ?>
                <tr>
                    <td ><?= ++$i ?></td>
                    <td style="text-align: center"><?= $key["name_" . Yii::$app->language] ?></td>
                    <td style="text-align: center"><?= $key["name_" . Yii::$app->language] ?></td>
                    <td style="text-align: center">
                        <a href="<?= Url::to(['references/index', 'id' => $key['id']]) ?>"
                           class="badge badge-info"><?= Yii::t('app', '+References') ?></a>
                    </td>
                    <td style="text-align: center">
                        <a href="<?= Url::to(['references-type/update', 'id' => $key['id']]) ?>" class="btn btn-icon btn-xs btn-outline-primary update-one">
                            <i class="la la-pencil-square-o"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <!--end: Datatable-->
        </div>
    </div>
</div>
<!--end::Card-->
<button class="offcanvas" id="kt_demo_panel_toggle"></button>
<?php
$js = <<<JS
$('body').delegate('.update-one', 'click', function(e) {
    e.preventDefault();
    let url=$(this).attr('href');
    $('#kt_demo_panel_toggle').click(); 
    $('.right-modal-all').load(url); 
});
JS;
$this->registerJs($js);



