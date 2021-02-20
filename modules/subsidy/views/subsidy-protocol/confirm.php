<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use app\modules\subsidy\models\Appeal;
use app\modules\manuals\models\AppealStatus;

/* @var $this yii\web\View */
/* @var $model app\modules\subsidy\models\SubsidyProtocol */
/* @var $form yii\widgets\ActiveForm */

/* @var $appeals Appeal[]*/
$appeals = Appeal::find()->where(['subsidy_protocol_id' => $model->id])->all();
$appeals_count = count($appeals);

/* @var $new_appeals Appeal[]*/
$new_appeals = Appeal::find()->where(['appeal_status' => AppealStatus::APPEAL_AGENCY_ACCEPTED])->all();
$new_appeals_count = count($new_appeals);
?>
<div class="subsidy-protocol-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'protocol_number')->textInput(['maxlength' => true]) ?>

    <?php
    echo $form->field($model, 'protocolDateSimple')->textInput([ 'id' => 'kt_protocol_date_simple', ]);
    ?>


    <?= $form->field($model, 'total_sum')->textInput() ?>

    <div class="">
        <?= $form->field($model, 'protocol_file')->fileInput() ?>
        <?php if($model->file) : ?>
            <div class="form-group">
                <a href="<?=Url::to(['/'.$model->file])?>" target="_blank"><?=Yii::t('app', 'protocol')?></a>
            </div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Confirm'), ['class' => 'btn btn-success']) ?>
        <?php if(!$model->isNewRecord) echo Html::button(Yii::t('app', 'Appeals in protocol ({0})', [$appeals_count]), ['class' => 'btn btn-primary', 'id' => 'show_appeals', 'data-toggle' => "modal", 'data-target' => "#showAppealsModal"]) ?>
        <?php if(!$model->isNewRecord) echo Html::button(Yii::t('app', 'New appeals ({0})', [$new_appeals_count]), ['class' => 'btn btn-primary', 'id' => 'show_new_appeals', 'data-toggle' => "modal", 'data-target' => "#referToCouncilModal"]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<div class="modal fade" id="showAppealsModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2" style="color:#5555dd"><?=Yii::t('app-msg', 'Appeals in protocol')?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <h3><?=Yii::t('app-msg', 'Appeals')?></h3>
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Kontragent</th>
                    </tr>
                    <?php foreach($appeals as $appeal): ?>
                        <tr>
                            <td>
                                <?=$appeal->id?>
                            </td>
                            <td>
                                <?=$appeal->contragent->name;?>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                    <?php if($appeals_count == 0) : ?>
                        <tr>
                            <td colspan="2">
                                Bu protokolga arizalar hali biriktirilmagan.
                            </td>
                        </tr>
                    <?php endif; ?>

                </table>
                <br/>
                <br/>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal"><?=Yii::t('app', 'Close')?></button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="referToCouncilModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2" style="color:#5555dd"><?=Yii::t('app-msg', 'Add appeals to protocol')?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <h3><?=Yii::t('app-msg', 'Appeals')?></h3>
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Kontragent</th>
                    </tr>
                    <?php foreach($new_appeals as $appeal): ?>
                        <tr>
                            <td>
                                <input name="appeal-ids" type="checkbox" value="<?=$appeal->id?>" checked="checked"/>
                            </td>
                            <td>
                                <?=$appeal->contragent->name;?>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                    <?php if($new_appeals_count == 0) : ?>
                        <tr>
                            <td colspan="2">
                                Yangi arizalar topilmadi.
                            </td>
                        </tr>
                    <?php endif; ?>

                </table>
                <br/>
                <br/>
                <input id="appeal-status" type="hidden" value="<?=AppealStatus::APPEAL_REFERRED_TO_COUNCIL?>" />
                <input id="subsidy-protocol-id" type="hidden" value="<?=$model->id?>" />
                <textarea id="appeal-comment"><?=Yii::t('app-msg', 'Appeal is referred to council.')?></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal"><?=Yii::t('app', 'Close')?></button>
                <button type="button" class="btn btn-primary font-weight-bold" onclick="referAppealsToCouncil(event);"><?=Yii::t('app', 'Add to protocol')?></button>
            </div>
        </div>
    </div>
</div>

<style>
div#referToCouncilModal .modal-body textarea {
    width:100%;
    height: 100px;
}
</style>

<script>
var AddAppealsToProtocolUrl = "<?=Url::to(['subsidy-protocol/add-appeals-to-protocol'])?>";

function getCsrfData() {
    let param = $("head meta[name=csrf-param]").attr("content");
    let value = $("head meta[name=csrf-token]").attr("content");
    let data = {};
    data[param] = value;
    return data;
}

function referAppealsToCouncil(e) {
    let data = getCsrfData();
    let appealIds = [];
    $("input[name=appeal-ids]:checked").each(function(){
        appealIds.push($(this).val())
    });
    if(appealIds.length == 0) {
        alert('Protokolga biriktirish uchun arizani tanglang.');
        return;
    }

    data['appeal-ids'] = appealIds;
    // data['status'] = $("#appeal-status").val();
    data['subsidy-protocol-id'] = $("#subsidy-protocol-id").val();
    data['comment'] = $("#appeal-comment").val();
    $.ajax({
        url: AddAppealsToProtocolUrl,
        data: data,
        type: 'POST',
        success: function(response) {
            if(response.message) {
                alert(response.message);
            }
            if(response.refresh == 1) {
                $("#acceptAppealModal").modal("hide");
                document.location = document.location;
            } else if(response.result == 1) {
                $("#acceptAppealModal").modal("hide");
            }
        },
        error: function(error) {
            alert(error);
        }
    });
}
// $("#kt_protocol_date_simple").datepicker({ format: "dd.mm.yyyy" })
</script>

<?php
$datepickerLocale = <<<JS
$.fn.datepicker.dates['ru'] = {
         days: ["Воскресенье", "Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота"],
         daysShort: ["Вос", "Пон", "Вто", "Сре", "Чет", "Пят", "Суб"],
         daysMin: ["Во", "По", "Вт", "Ср", "Че", "Пя", "Су"],
         months: ["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь" ],
         monthsShort: ["Ян", "Фев", "Мар", "Апр", "Май", "Июнь", "Июль", "Сред", "Сен", "Окт", "Ной", "Дек" ],
         today: "Сегодня",
         clear: "Очистить",
         titleFormat: "MM yyyy"
}
$.fn.datepicker.dates['uz'] = {
        days: ["Yakshanba", "Dushanba", "Seshanba", "Chorshanba", "Payshanba", "Juma", "Shanba"],
        daysShort: ["Yak", "Du", "Se", "Chor", "Pay", "Ju", "Sha"],
        daysMin: ["Ya", "Du", "Se", "Ch", "Pa", "Ju", "Sh"],
        months: ["Yanval", "Fevral", "Mart", "Aprel", "May", "Iyun", "Iyul", "Avgust", "Sentabr", "Oktobr", "Noyabr", "Dekabr"],
        monthsShort: ["Yan", "Fev", "Mar", "Apr", "May", "Iyun", "Iyul", "Avg", "Sen", "Okt", "Noy", "Dek"],
        today: "Bugun",
        clear: "Tozalash",
        titleFormat: "MM yyyy"
}
// $.fn.datepicker.defaults['format'] = 'dd.mm.yyyy';
JS;

$this->registerJs($datepickerLocale, \yii\web\View::POS_LOAD);
$this->registerJs('$("#kt_protocol_date_simple").datepicker({ format: "dd.mm.yyyy", language: "ru", weekStart:1 })', \yii\web\View::POS_LOAD);

