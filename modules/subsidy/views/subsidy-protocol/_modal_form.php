<?php

use app\assets\AppAsset;
use app\modules\manuals\models\AppealStatus;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

AppAsset::register($this);

// vdd($commission_members);

?>
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

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#acceptAppealModal">
    <?=Yii::t('app', 'Кенгаш аъзолори қушиш')?>
</button>

<!-- Modal-->
<div class="modal fade" id="acceptAppealModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <?php $form = ActiveForm::begin([
            'action' => '/subsidy/subsidy-protocol/commission-create',
            'options' => [
                'class' => 'form fv-plugins-bootstrap fv-plugins-framework',
                'id' =>'kt_form_1',
            ]
        ]); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1" style="color:#55dd55"><?=Yii::t('app', 'Кенгаш аъзолори руйҳати')?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                <input type="hidden" name="CommissionMembers[subsidy_protocol_id]" value="<?=$model->id?>">                                  
                    <!-- update commission -->
                    <?php if(isset($commission_members)):?>
                        <?php foreach ($commission_members as $key => $value) : $remove = 'remove_'.($key+1); $name = 'full_nam_'.($value->id); $close = 'update_and_close_'.($key + 1);?>                            
                            <div class="row new-row" id="<?=$close?>">
                                <input type="hidden" value="<?=$value->id?>" id="<?=$remove?>">
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
                                            <input type="text" class="form-control form-control-lg form-control-solid input_colose" placeholder="Ф.И.О" name="UpdateCommissionMembers[<?=$name?>]" value='<?=$value->fullname?>'>                                  
                                            <button type="button" class="btn btn-outline-danger btn-xs" title="Удалить" style="margin-top: 10px;max-height: 23px;" onclick="updatecloseCommission(<?=$key+1?>);">
                                                <i class="la la-close ml-1"></i>
                                            </button>
                                        </div>                                
                                    </div>
                                </div>
                            </div>
                        <?php endforeach?>
                     <?php endif?>   
                     <!-- create commission -->
                    <!-- <div class="row new-row" id="new_and_close_1">
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
                    </div> -->
                    <div id="new_commission"></div>     
                </div>
                <div class="modal-footer" style="justify-content: space-between!important;">
                    <button type="button" class="btn btn-success font-weight-bold float-left" id="add_commission">
                        <i class="la la-plus ml-1"></i><?=Yii::t('app', 'Янги кенгаш қушиш')?>
                    </button>
                    
                    <button type="button" class="btn btn-light-danger font-weight-bold" data-dismiss="modal">
                        <i class="la la-close ml-1"></i><?=Yii::t('app', 'Close')?>
                    </button>
                    <button type="submit" class="btn btn-primary font-weight-bold">
                        <i class="la la-save ml-1"></i><?=Yii::t('app', 'Save')?>
                    </button>
                </div>
            </div>
        <!-- </form> -->
    <?php ActiveForm::end(); ?>

    </div>
</div>

<?php
$this->registerJs('
    var count = 1;
    $("#add_commission" ).click(function() {
        count += 1;
        $.get("/subsidy/subsidy-protocol/html-commission",{count:count},function(response){        
            $("#new_commission").append(response);
        });  
    }); 

');
?>

<script>
    function getCsrfData() {
        let param = $("head meta[name=csrf-param]").attr("content");
        let value = $("head meta[name=csrf-token]").attr("content");
        let data = {};
        data[param] = value;
        return data;
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
