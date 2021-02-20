<?php

use app\modules\structure\models\OrgClassification;
use app\modules\admin\models\Users;
use yii\helpers\Url;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model app\modules\structure\models\OrgClassification*/
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $depAddress yii\data\ActiveDataProvider */
/* @var $debBankAcount yii\data\ActiveDataProvider */
/* @var $depVat yii\data\ActiveDataProvider */
/* @var $license yii\data\ActiveDataProvider */
/* @var $tree string */

$this->title = Yii::t('app', 'Org Classifications');
$this->params['breadcrumbs'][] = $this->title;

//create button
    $create = Yii::t('app', '+ Create');

//address
    $p_location = Yii::t('app', 'Physical Location');
    $l_location = Yii::t('app', 'Legal Location');
    $status = Yii::t('app', 'Status');
    $tel = Yii::t('app', 'Tel');
    $email = Yii::t('app', 'Email');
    $act = Yii::t('app', 'Act');

//bank-account
    $b_account_type = Yii::t('app', 'Account type');
    $b_bank_account = Yii::t('app', 'Bank account');
    $b_banks = Yii::t('app', 'Banks');
    $b_mfo = Yii::t('app', 'MFO');
    $b_inn = Yii::t('app', 'INN');
    $b_address = Yii::t('app', 'Address');
    $b_status = Yii::t('app', 'Status');

//vat
    $v_vat = Yii::t('app', 'VAT (%)');
    $v_started = Yii::t('app', 'Started date');
    $v_finished = Yii::t('app', 'Finished date');

//license
    $l_res = Yii::t('app', 'Responsible');
    $l_serial = Yii::t('app', 'Serial');
    $l_order = Yii::t('app', 'Order Number');
?>

<style>
    thead{
        background: #F9F9F9;
    }
    tr{
        margin-left: 10px;
    }
    table {
        box-shadow: 0 4px 8px #666;
        border: 1px solid #F9F9F9!important;
    }
    .one td{
        line-height: 25px;
    }
</style>
        <!--begin::Todo Docs-->
        <div class="d-md-flex flex-row">
            <!--begin::Aside-->
            <div class="flex-row-auto col-sm-12 col-md-12" id="kt_todo_aside" style="padding: 0!important;">
                <!--begin::Card-->
                <div class="card card-custom card-stretch" style="margin-bottom: 5px;">
                    <!--begin::Body-->
                    <div class="card-body px-5" style="overflow:hidden !important;">
                        <!--begin:Nav-->
                        <button class="btn btn-sm-button btn-outline-info" id="kt_demo_panel_toggle" href="<?=Url::to(['org-classification/create'])?>"><i class="la la-plus ml-1"></i></button>
                        <button class="btn btn-sm-button btn-outline-success" id="kt_demo_panel_toggle_root"  href="<?=Url::to(['org-classification/create'])?>"><i class="la la-tree ml-1"></i></button>
                        <button class="btn btn-sm-button btn-outline-danger delete-tree" href="<?=Url::to(['org-classification/delete-ajax'])?>"><i class="la la-trash ml-1"></i></button>
                        <button class="btn btn-sm-button btn-outline-primary update-tree-elements" href="<?=Url::to(['org-classification/update']); ?>"><i class="la la-pen ml-1"></i></button>
                        <button class="btn btn-sm-button btn-outline-warning view-tree-elements" href="<?=Url::to(['org-classification/view']); ?>"><i class="la la-eye ml-1"></i></button>
                        <br><br>
                        <div id="kt_tree_1" class="tree-demo" style="overflow:hidden !important;">
                            <?=$tree?>
                        </div>
                        <!--end:Nav-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Aside-->
            <!--begin::List-->

            <!-- <div class="flex-row-fluid d-flex ml-md-2 flex-column">
                <div class="d-flex flex-column flex-grow-1">
                    <div class="card card-custom card-transparent">
                        <div class="card-body p-0">

                            <div class="card card-custom card-shadowless rounded">

                                <div class="card-body p-0">
                                    <div class="my-0">
                                        <div class="card-body">
                                            <div class="row">
                                                <?php 
                                                for ($i=0; $i < count($orgClass); $i++) {
                                                    ($orgClass[$i]['status'] == 1) ? $true=1 : $false=1;
                                                }
                                                ?>
                                            <?php if (!empty($orgClass) && $true == 1){ ?>
                                                <div class="col-12">
                                                    <table class="table table-bordered">
                                                        <thead class="one">
                                                            <tr>
                                                                <th class="pb-2" class="pb-2"><?php echo Yii::t('app', 'Name Uz');?></th>
                                                                <td id="tree-name_uz" class="font-weight-normal"><?=$orgClass[0]['name_uz']?></td>
                                                            </tr>
                                                            <tr>
                                                                <th class="pb-2"><?php echo Yii::t('app', 'Name Ru');?></th>
                                                                <td id="tree-name_ru" class="font-weight-normal"><?=$orgClass[0]['name_ru']?></td>
                                                            </tr>
                                                            <tr>
                                                                <th class="pb-2"><?php echo Yii::t('app', 'Name En');?></th>
                                                                <td id="tree-name_en" class="font-weight-normal"><?=$orgClass[0]['name_en']?></td>
                                                            </tr>
                                                            <tr>
                                                                <th class="pb-2"><?php echo Yii::t('app', 'Stat Code');?></th>
                                                                <td id="tree-stat_code" class="font-weight-normal"><?=$orgClass[0]['stat_code']?></td>
                                                            </tr>
                                                            <tr>
                                                                <th class="pb-2"><?php echo Yii::t('app', 'Tax Code');?></th>
                                                                <td id="tree-tax_code" class="font-weight-normal"><?=$orgClass[0]['tax_code']?></td>
                                                            </tr>
                                                            
                                                        </thead>
                                                    </table>
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th><?php echo Yii::t('app', 'Created By');?></th>
                                                                <td class="font-weight-normal"><span id="tree-created_by"><?=Users::findOne($orgClass[0]['created_by'])->fullname;?></span><br><small><b id="tree-created_at" style="color: green; font-size: 10px"><?=date('d.m.Y H:i', $orgClass[0]['created_at'])?></b></small></td>
                                                            </tr>
                                                            <tr>
                                                                <th><?php echo Yii::t('app', 'Updated By');?></th>
                                                                <td class="font-weight-normal"><span id="tree-updated_by"><?=Users::findOne($orgClass[0]['updated_by'])->fullname;?></span><br><small><b id="tree-updated_at" style="color: red; font-size: 10px"><?=date('d.m.Y H:i', $orgClass[0]['updated_at'])?></b></small></td>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            <?php }else{ ?>
                                                <div class="col-5"></div>   
                                                <strong class="col-1"><i class="fas fa-ghost fa-5x"></i></strong>
                                                <div class="col-5"></div>
                                            <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                        
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div> -->

            <!--end::List-->
        </div>
        <!--end::Todo Docs-->
<button id="kt_demo_panel_toggle1" class="offcanvas">salom</button>

<?php
$urlToGetItems = Url::to(['org-classification/get-items-ajax']);
$deb = Yii::$app->request->get('deb') ?? null;
$js = <<< JS

var address_bool = 1;
var bank_account_bool = 0;
var vat_bool = 0;
var license_bool = 0;

if ('{$deb}' != ''){
    var value = $('#kt_tree_1 li');
    value.each(function(index, item) {
        if ($(item).attr('aria-selected') == 'true') {
            $(item).attr('aria-selected', 'false');
        }
        if ($(item).val() == '{$deb}'*1) {
            $(item).attr('aria-selected', 'true');
            $('.jstree-icon').css({'color':'#0c5460'});
            $('.jstree-anchor').css({'background-color':'white','color':'black'});
            $(item).find('a:first').css({'background-color':'#0c5460','color':'white'});
            $(item).find('a:first').find('.jstree-icon').css({'color':'white'});
        }
    });
} else {
    var value = $('#kt_tree_1 li');
    value.each(function(index, item) {
        if ($(item).attr('aria-selected') == 'true') {
            $('.jstree-icon').css({'color':'#0c5460'});
            $('.jstree-anchor').css({'background-color':'white','color':'black'});
            $(item).find('a:first').css({'background-color':'#0c5460','color':'white'});
            $(item).find('a:first').find('.jstree-icon').css({'color':'white'});
        }
    });
}



$('body').delegate('.jstree-anchor', 'click', function() {
    $('.jstree-icon').css({'color':'#0c5460'});
    $('.jstree-anchor').css({'background-color':'white','color':'black'});
    $(this).css({'background-color':'#0c5460','color':'white'});
    $(this).find('.jstree-icon').css({'color':'white'});
});

// tree create
$('body').delegate('#kt_demo_panel_toggle', 'click', function(e) {
    let url=$(this).attr('href');
    $('.right-modal-all').load(url); 
});

//tree-root create
$('body').delegate('#kt_demo_panel_toggle_root', 'click', function(e) {
    e.preventDefault();
    var value = $('#kt_tree_1 li');
    value.each(function(index, item) {
        if ($(item).attr('aria-selected') == 'true') {
            $(item).attr('aria-selected', 'false');
        }
    });
    $('#kt_demo_panel_toggle').click(); 
});

//tree elements update
$('body').delegate('.update-tree-elements', 'click', function(e) {
    e.preventDefault();
    var value = $('#kt_tree_1 li');
    var id;
    value.each(function(index, item) {
        if ($(item).attr('aria-selected') == 'true') {
            id = $(item).val();
        }
    });
    let url=$(this).attr('href') + '?id=' + id;
    $('#kt_demo_panel_toggle1').click(); 
    $('.right-modal-all1').load(url); 
  
});

$('body').delegate('.view-tree-elements', 'click', function(e) {
    e.preventDefault();
    var value = $('#kt_tree_1 li');
    var id;
    value.each(function(index, item) {
        if ($(item).attr('aria-selected') == 'true') {
            id = $(item).val();
        }
    });
    let url=$(this).attr('href') + '?id=' + id;
    $('#kt_demo_panel_toggle1').click(); 
    $('.right-modal-all1').load(url); 
});

// delete tree
$('body').delegate('.delete-tree', 'click', function(e) {
    e.preventDefault();
    let url=$(this).attr('href');
    var value = $('#kt_tree_1 li');
    var id;
    value.each(function(index, item) {
        if ($(item).attr('aria-selected') == 'true') {
            id = $(item).val()*1;
        }
    });
    if(id > 0){
        $.ajax({
            url:url,
            data:{id:id},
            type:'GET',
            success: function(response){
                if(response){
                    var value = $('#kt_tree_1 li');
                    value.each(function(index, item) {
                        if ($(item).attr('aria-selected') == 'true') {
                            $(item).remove();
                        }
                    });
                }               
            }
        });
    }
});

// delete license OrgClassification
$('body').delegate('.delete-license-OrgClassification', 'click', function(e) {
    e.preventDefault();
    let url=$(this).attr('href');
    let item = $(this).parents('tr');
    $.ajax({
        url:url,
        data:{},
        type:'GET',
        success: function(response){
            if(response){
                $(item).remove();
            }   
            
        }
    });
});

//create, update va view larni madal yordamida chiqarish uchun
$('body').delegate('.address-create, .bank-account-create, .vat-create, .update-address, .update-bank-account, .update-vat, .view-address', 'click', function(e) {
    e.preventDefault();
    let url=$(this).attr('href');
    $('.right-modal-all1').load(url);
    $('#kt_demo_panel_toggle1').click();
  
});

//license create va update larni url larini o'zgartirish uchun
$('body').delegate('#kt_tree_1 li', 'click', function(e) {
    e.preventDefault();
    let value = $('#kt_tree_1 li');
    var id;
    value.each(function(index, item) {
        if ($(item).attr('aria-selected') == 'true') {
            id = $(item).val();
            return false;
        }
    });
    let href_create = '/manuals/license/create-OrgClassification?dep=' + id;
    $('.license-create').attr('href', href_create);
});

// Ajax yordamida tablelarni toldirish uchun
$('body').delegate('li', 'click', function(e) {
    let id = $(this).val();
    if ($(this).attr('aria-selected') == 'true') {
        $.ajax({
            url:'{$urlToGetItems}',
            data:{id:id},
            type:'GET',
            success: function(response){
                if(response.status == 'success'){
                    $('#tree-name_uz').text(response.data.name_uz).trigger('change');
                    $('#tree-name_ru').text(response.data.name_ru).trigger('change');
                    $('#tree-name_en').text(response.data.name_en).trigger('change');
                    $('#tree-stat_code').text(response.data.stat_code).trigger('change');
                    $('#tree-tax_code').text(response.data.tax_code).trigger('change');
                    $('#tree-created_at').text(response.created_at_text).trigger('change');
                    $('#tree-created_by').text(response.created_by_text).trigger('change');
                    $('#tree-updated_at').text(response.updated_at_text).trigger('change');
                    $('#tree-updated_by').text(response.updated_by_text).trigger('change');
                } else {
                    Swal.fire(response.errorMsg, 'xatolik', "warning");
                }             
            }
        });
    }
});

// Tableni mini page o'zgarganda ishga tushurgani
$('body').delegate('.wizard-step', 'click', function(e) {
    if ($(this).attr('data-selected') == 'address' && address_bool == 0) {
        KTDatatableHtmlTableDemo4.init();
        address_bool = 1;
    } else if ($(this).attr('data-selected') == 'bank_account' && bank_account_bool == 0) {
        KTDatatableHtmlTableDemo1.init();
        bank_account_bool = 1;
    }else if ($(this).attr('data-selected') == 'vat' && vat_bool == 0) {
        KTDatatableHtmlTableDemo2.init();
        vat_bool = 1;
    } else if ($(this).attr('data-selected') == 'license' && license_bool == 0) {
        KTDatatableHtmlTableDemo3.init();
        license_bool = 1;
    }   
});

$(document).ready(function() {
    var value = $('#kt_tree_1 li');
    value.each(function(index, item) {
        if ($(item).attr('aria-selected') == 'true') {
            $(item).click()
        }
    });
});
JS;
$this->registerJs($js);
$this->registerJsFile('@web/asset/js/pages/custom/user/add-user.js?v=7.0.3', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('@web/asset/js/pages/crud/ktdatatable/base/html-table.js?v=7.0.3', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerCssFile('@web/asset/css/pages/wizard/wizard-4.css?v=7.0.3', ['depends' => [\yii\web\JqueryAsset::className()]]);
?>
