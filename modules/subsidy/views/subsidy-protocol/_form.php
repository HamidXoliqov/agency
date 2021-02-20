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
$appeals = Appeal::find()->where(['subsidy_protocol_id' => $model->id, 'appeal_status' => AppealStatus::APPEAL_REFERRED_TO_COUNCIL])->all();
$appeals_count = count($appeals);

/* @var $new_appeals Appeal[]*/
$new_appeals = Appeal::find()->where(['appeal_status' => AppealStatus::APPEAL_AGENCY_ACCEPTED])->all();
$new_appeals_count = count($new_appeals);

$create = $model->isNewRecord;
$update = !$create;
?>
<!--begin::Card-->
<div class="card card-custom gutter-b">
    <div class="card-body">

        <div class="subsidy-protocol-form">
            <?php $form = ActiveForm::begin(); ?>


            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'protocol_number')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-4">
                    <?php
                    echo $form->field($model, 'protocolDateSimple')->textInput([ 'id' => 'kt_protocol_date_simple', ]);
                    ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'total_sum')->textInput() ?>
                </div>
            </div>

            <div class="">
                <?= $form->field($model, 'protocol_file')->fileInput() ?>
                <?php if($model->file) : ?>
                    <div class="form-group">
                        <a href="<?=Url::to(['/'.$model->file])?>" target="_blank"><?=Yii::t('app', 'protocol')?></a>
                    </div>
                <?php endif; ?>
            </div>

            <hr />
            <br/>

            <div class="form-group">
                <h3><?=Yii::t('app', 'Appeals')?></h3>
                <?php if($update): ?>
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
                                    Бу протоколга аризалар ҳали бириктирилмаган.
                                </td>
                            </tr>
                        <?php endif; ?>

                    </table>

                    <?php echo Html::button(Yii::t('app', 'New appeals ({0})', [$new_appeals_count]), ['class' => 'btn btn-primary', 'id' => 'show_new_appeals', 'data-toggle' => "modal", 'data-target' => "#referToCouncilModal"]) ?>
                <?php endif; ?>

                <?php if($create):?>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>ID</th>
                            <th>Kontragent</th>
                        </tr>
                        <?php foreach($new_appeals as $appeal): ?>
                            <tr>
                                <td>
                                    <input name="appeal-ids[]" type="checkbox" value="<?=$appeal->id?>" checked="checked"/>
                                </td>
                                <td>
                                    <?=$appeal->contragent->name;?>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                        <?php if($new_appeals_count == 0) : ?>
                            <tr>
                                <td colspan="2">
                                    Янги аризалар топилмади.
                                </td>
                            </tr>
                        <?php endif; ?>

                    </table>
                <?php endif; ?>

                <br/>
            </div>

            <hr />
            <br />

            <h3><?=Yii::t('app', 'Кенгаш аъзолари руйҳати')?></h3>

            <div class="form-group">
                <?php if(isset($commission_members)): ?>
                    <input id="new_commission_members_count" name="new_commission_members_count" type="hidden" value="0">
                    <?php foreach ($commission_members as $key => $value) :
                    $remove = 'remove_'.($key+1);
                    $name = 'full_nam_'.($value->id);
//                    $close = 'update_and_close_'.($key + 1);
                    ?>
                        <div class="row new-row" id="<?=$remove?>">
                            <input name="commission_member_ids[]" type="hidden" value="<?=$value->id?>" id="<?=$remove?>">
                            <div class="col-xl-3">
                                <div class="form-group row fv-plugins-icon-container margin-row" >
                                    <label>Ташкилот ИНН</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control form-control-lg form-control-solid soliq_inn" value="<?=$value->org_inn?>" disabled>
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button" disabled>
                                                    <span>
                                                        <i class="flaticon2-search-1 icon-md"></i>
                                                    </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="form-group row fv-plugins-icon-container margin-row">
                                    <label>Ташкилот Номи</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-lg form-control-solid" value='<?=$value->org_name?>' disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-5">
                                <div class="form-group row fv-plugins-icon-container margin-row">
                                    <label>Маъсул шаҳс Ф.И.О</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-lg form-control-solid input_colose" placeholder="Ф.И.О" name="UpdateCommissionMembers[<?=$value->id?>]" value='<?=$value->fullname?>'>
                                        <button type="button" class="btn btn-outline-danger btn-xs" title="Удалить" style="margin-top: 10px;max-height: 23px;" onclick="removeCommissionMember(<?=$key+1?>);">
                                            <i class="la la-close ml-1"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach?>

                <?php else: ?>

                    <input id="new_commission_members_count" name="new_commission_members_count" type="hidden" value="1">
                    <div class="row new-row" id="new_and_close_1">
                        <div class="col-xl-3">
                            <div class="form-group row fv-plugins-icon-container margin-row" >
                                <label>Ташкилот ИНН</label>
                                <div class="input-group">
                                    <input type="number" class="form-control form-control-lg form-control-solid soliq_inn" placeholder="Поиск инн" name="CommissionMembers[org_inn_1]" id="soliq_inn_1" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button" onclick="soliqInn(1);">
                                            <span>
                                                <i class="flaticon2-search-1 icon-md"></i>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group row fv-plugins-icon-container margin-row">
                                <label>Ташкилот Номи</label>
                                <div class="input-group">
                                    <input type="hidden" class="form-control form-control-lg form-control-solid" name="CommissionMembers[org_name_1]" value="" id="org_name_hidden_id_1">
                                    <input type="text" class="form-control form-control-lg form-control-solid" placeholder="Ташкилот Номи" value="" disabled id="org_name_1">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5">
                            <div class="form-group row fv-plugins-icon-container margin-row">
                                <label>Маъсул шаҳс Ф.И.О</label>
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-lg form-control-solid input_colose" placeholder="Ф.И.О" name="CommissionMembers[fullname_1]" required>
                                    <button type="button" class="btn btn-outline-danger btn-xs" title="Удалить" style="margin-top: 10px;max-height: 23px;" onclick="closeCommission(1);">
                                        <i class="la la-close ml-1"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <div id="new_commission"></div>

                <br />

                <button type="button" class="btn btn-primary font-weight-bold float-left" id="add_commission_js" onclick="addCommissionMemberRow();">
                    <i class="la la-plus ml-1"></i><?=Yii::t('app', 'Янги кенгаш аъзоси қўшиш')?>
                </button>

            </div>

            <br />
            <br />
            <br />

            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
                <?php
                //        if(!$model->isNewRecord) echo Html::button(Yii::t('app', 'Appeals in protocol ({0})', [$appeals_count]), ['class' => 'btn btn-primary', 'id' => 'show_appeals', 'data-toggle' => "modal", 'data-target' => "#showAppealsModal"]);
                ?>

            </div>

            <?php ActiveForm::end(); ?>

        </div>

    </div>
</div>


<div class="modal fade" id="showAppealsModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2" style="color:#5555dd"><?=Yii::t('app', 'Appeals in protocol')?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <h3><?=Yii::t('app', 'Appeals')?></h3>
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
                <h5 class="modal-title" id="exampleModalLabel2" style="color:#5555dd"><?=Yii::t('app', 'Add appeals to protocol')?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <h3><?=Yii::t('app', 'Appeals')?></h3>
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
                                Янги аризалар топилмади.
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


<style>
    @media (min-width: 992px) {
        .modal-dialog {
            max-width: 70%!important;
        }
    }
    .margin-row{
        margin: 0px 5px 0px 5px;
    }
    .new-row{
        margin-top: 15px;
    }
    .input_colose{
        margin-right: 10px;
    }
</style>

<script>
addYiiPosLoadJs(function(){
    $.fn.datepicker.dates['ru'] = {
        days: ["Воскресенье", "Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота"],
        daysShort: ["Вос", "Пон", "Вто", "Сре", "Чет", "Пят", "Суб"],
        daysMin: ["Во", "По", "Вт", "Ср", "Че", "Пя", "Су"],
        months: ["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь" ],
        monthsShort: ["Ян", "Фев", "Мар", "Апр", "Май", "Июнь", "Июль", "Сред", "Сен", "Окт", "Ной", "Дек" ],
        today: "Сегодня",
        clear: "Очистить",
        titleFormat: "MM yyyy"
    };
    $.fn.datepicker.dates['uz'] = {
        days: ["Yakshanba", "Dushanba", "Seshanba", "Chorshanba", "Payshanba", "Juma", "Shanba"],
        daysShort: ["Yak", "Du", "Se", "Chor", "Pay", "Ju", "Sha"],
        daysMin: ["Ya", "Du", "Se", "Ch", "Pa", "Ju", "Sh"],
        months: ["Yanval", "Fevral", "Mart", "Aprel", "May", "Iyun", "Iyul", "Avgust", "Sentabr", "Oktobr", "Noyabr", "Dekabr"],
        monthsShort: ["Yan", "Fev", "Mar", "Apr", "May", "Iyun", "Iyul", "Avg", "Sen", "Okt", "Noy", "Dek"],
        today: "Bugun",
        clear: "Tozalash",
        titleFormat: "MM yyyy"
    };
    // $("#kt_protocol_date_simple").datepicker({ format: "dd.mm.yyyy" })
// $.fn.datepicker.defaults['format'] = 'dd.mm.yyyy';
});
addYiiPosLoadJs(function () {
    $("#kt_protocol_date_simple").datepicker({ format: "dd.mm.yyyy", language: "ru", weekStart:1 });
});
</script>

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
    if($("input[name=appeal-ids]").length == 0) {
        alert('Протоколга бириктириш учун янги аризалар топилмади.');
        return;
    }
    $("input[name=appeal-ids]:checked").each(function(){
        appealIds.push($(this).val())
    });
    if(appealIds.length == 0) {
        alert('Протоколга бириктириш учун аризани тангланг.');
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

</script>

<?php
$this->registerJs('
//    var count = 1;
//    $("#add_commission" ).click(function() {
//        count += 1;
//        $("#commission_members_count").val(count);
//        $.get("/subsidy/subsidy-protocol/html-commission",{count:count},function(response){        
//            $("#new_commission").append(response);
//        });  
//    }); 

');
?>

<script>
    function addCommissionMemberRow() {
        let newCount = parseInt($("#new_commission_members_count").val()) + 1;
        $("#new_commission_members_count").val(newCount);
        let $index = newCount;

        let $inn = 'CommissionMembers[org_inn_' + $index + ']';
        let $org_name = 'CommissionMembers[org_name_' + $index + ']';
        let $full_name = 'CommissionMembers[fullname_' + $index + ']';
        // input id
        let $inn_id = 'soliq_inn_' + $index;
        let $org_name_id = 'org_name_' + $index;
        let $org_name_hidden_id = 'org_name_hidden_id_' + $index;
        let $new_and_close = 'new_and_close_' + $index;

        let html =
            '<div class="row new-row" id="' + $new_and_close + '">\n' +
            '    <div class="col-xl-3">\n' +
            '        <div class="form-group row fv-plugins-icon-container margin-row" >\n' +
            '            <label>Ташкилот ИНН</label>\n' +
            '            <div class="input-group">\n' +
            '                <input type="number" class="form-control form-control-lg form-control-solid soliq_inn" placeholder="Поиск инн" name="' + $inn + '" id="' + $inn_id + '">\n' +
            '                <div class="input-group-append">\n' +
            '                    <button class="btn btn-primary" type="button" onclick="soliqInn(' + $index + ');">\n' +
            '                        <span>\n' +
            '                            <i class="flaticon2-search-1 icon-md"></i>\n' +
            '                        </span>\n' +
            '                    </button>\n' +
            '                </div>\n' +
            '            </div>\n' +
            '        </div>\n' +
            '    </div>                        \n' +
            '    <div class="col-xl-4">\n' +
            '        <div class="form-group row fv-plugins-icon-container margin-row">\n' +
            '            <label>Ташкилот Номи</label>\n' +
            '            <div class="input-group">\n' +
            '                <input type="hidden" class="form-control form-control-lg form-control-solid" name="' + $org_name + '" value="" id="' + $org_name_hidden_id + '">\n' +
            '                <input type="text" class="form-control form-control-lg form-control-solid" placeholder="Ташкилот Номи" value="" disabled id="' + $org_name_id + '">\n' +
            '            </div>\n' +
            '        </div>\n' +
            '    </div>                        \n' +
            '    <div class="col-xl-5">\n' +
            '        <div class="form-group row fv-plugins-icon-container margin-row">\n' +
            '            <label>Маъсул шаҳс Ф.И.О</label>\n' +
            '            <div class="input-group">\n' +
            '                <input type="text" class="form-control form-control-lg form-control-solid input_colose" placeholder="Ф.И.О" name="' + $full_name + '">                                  \n' +
            '                <button type="button" class="btn btn-outline-danger btn-xs" title="Удалить" style="margin-top: 10px;max-height: 23px;" onclick="closeCommission(' + $index + ');">\n' +
            '                    <i class="la la-close ml-1"></i>\n' +
            '                </button>\n' +
            '            </div>\n' +
            '        </div>\n' +
            '    </div>\n' +
            '</div> ';
        $("#new_commission").append(html);
        return html;
    }

    function removeCommissionMember(key) {
        $("#" + "remove_" + key).remove();
    }


    function updatecloseCommission(e)
    {
        var remove_id = "remove_" + e;
        var commission_id = $("#"+remove_id).val();
        var data = "update_and_close_" + e;

        $.get("/subsidy/subsidy-protocol/commission-delete",{id:commission_id},function(response){
            if (response) {
                $("#" + data).remove();
            } else {
                alert(response);
            }
        });
    }

    function closeCommission(e)
    {
        var data = "new_and_close_" + e;
        $("#" + data).remove();
    }

    function soliqInn(e) {
        let data = getCsrfData();
        var id_soliq_inn = "soliq_inn_" + e;
        var id_org_name = "org_name_" + e;
        var id_org_name_hidden_id = "org_name_hidden_id_" + e;
        data['inn'] = $("#"+id_soliq_inn).val();

        $.ajax({
            url: '/subsidy/subsidy-protocol/soliq-inn',
            data: data,
            type: 'POST',
            success: function(response) {
                if(response) {
                    $("#"+id_org_name).val(response);
                    $("#"+id_org_name_hidden_id).val(response);
                }else{
                    alert(response);
                }
            },
            error: function(error) {
                alert(error);
            }
        });
    }
</script>
