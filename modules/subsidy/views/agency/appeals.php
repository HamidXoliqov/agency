<?php

use app\modules\manuals\models\AppealStatus;
use app\modules\manuals\models\AppealType;
use app\modules\manuals\models\Contragent;
use app\modules\subsidy\models\Appeal;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\bootstrap\ActiveForm;


/* @var $this yii\web\View */
/* @var $searchModel app\modules\subsidy\models\AppealSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Appeals');
$this->params['breadcrumbs'][] = $this->title;
$prop = 'name_'.Yii::$app->language;
?>
    <!--begin::Card-->
    <div class="card card-custom gutter-b">
        <div class="card-body">
            <!--begin: Datatable-->
            <div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable"></div>
            <!--end: Datatable-->
        </div>
    </div>
    <!--end::Card-->
    <!--begin::Modal-->
    <div class="modal fade" id="kt_datatable_records_fetch_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Selected Records</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="kt-scroll" data-scroll="true" data-height="200">
                        <ul id="kt_apps_user_fetch_records_selected"></ul>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!--end::Modal-->


<script>
    window.AGENCY_APPEALS_LIST_API_URL = "<?=Url::to(['agency/appeals-json'])?>";//http://loc.agency.uz/subsidy/agency/appeals-json";
    // Request URL: https://keenthemes.com/metronic/tools/preview/api/datatables/demos/default.php
    // Request Method: POST
    // Status Code: 200 OK
    // Remote Address: 178.62.61.16:443
    // Referrer Policy: strict-origin-when-cross-origin

</script>

<?php
use app\modules\manuals\models\Regions;
$this->registerJsFile('/js/appeal-list.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
/* @var $appealStatuses AppealStatus[]*/
$appealStatuses = AppealStatus::find()->all();
/* @var $appealTypes AppealType[]*/
$appealTypes = AppealType::find()->all();
/* @var $regions Regions[]*/
$regions = Regions::find()->all();
?>
<script>
window.AppealStatuses = {};
window.AppealTypes = {};
window.Regions = {};
window.AppealViewUrl="<?=Url::to(['agency/appeal-view', 'id' => ''])?>";
window.AppealViewPrintUrl="<?=Url::to(['agency/appeal-view-print', 'id' => ''])?>";
window.AppealViewDocUrl="<?=Url::to(['agency/appeal-view-doc', 'id' => ''])?>";
window.AppealDataTitles = {};
<?php
echo 'AppealDataTitles["Regions"] = "'.Yii::t('app', 'Regions').'";'."\n";
echo 'AppealDataTitles["Created Date"] = "'.Yii::t('app', 'Created Date').'";'."\n";
echo 'AppealDataTitles["Appeal Type"] = "'.Yii::t('app', 'Appeal Type').'";'."\n";
echo 'AppealDataTitles["Appeal Status"] = "'.Yii::t('app', 'Appeal Status').'";'."\n";
echo 'AppealDataTitles["Actions"] = "'.Yii::t('app', 'Action').'";'."\n";
foreach($appealStatuses as $stat) {
    echo "AppealStatuses['".$stat->id."'] = '".$stat->$prop."';\n";
}
foreach($appealTypes as $stat) {
    echo "AppealTypes['".$stat->id."'] = '".$stat->$prop."';\n";
}
foreach($regions as $stat) {
    echo 'Regions["'.$stat->id.'"] = "'.$stat->$prop.'";'."\n";
}
?>
</script>
