<?php

use app\modules\structure\models\Department;
use yii\helpers\Url;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model app\modules\structure\models\Department*/
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $depAddress yii\data\ActiveDataProvider */
/* @var $debBankAcount yii\data\ActiveDataProvider */
/* @var $depVat yii\data\ActiveDataProvider */
/* @var $license yii\data\ActiveDataProvider */
/* @var $tree string */

$this->title = Yii::t('app', 'Departments');
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
</style>
        <!--begin::Todo Docs-->
        <div class="d-md-flex flex-row">
            <!--begin::Aside-->
            <div class="flex-row-auto col-sm-12 col-md-2" id="kt_todo_aside" style="padding: 0!important;">
                <!--begin::Card-->
                <div class="card card-custom card-stretch" style="margin-bottom: 5px;">
                    <!--begin::Body-->
                    <div class="card-body px-5">
                        <!--begin:Nav-->
                        <button class="btn btn-sm-button btn-outline-info" id="kt_demo_panel_toggle" href="<?=Url::to(['department/create'])?>"><i class="la la-plus ml-1"></i></button>
                        <button class="btn btn-sm-button btn-outline-danger delete-tree" disabled href="<?=Url::to(['department/delete-ajax'])?>"><i class="la la-trash ml-1"></i></button>
                        <button class="btn btn-sm-button btn-outline-primary update-tree-elements" href="<?=Url::to(['department/update']); ?>"><i class="la la-pen ml-1"></i></button>
                        <br><br>
                        <div id="kt_tree_1" class="tree-demo">
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
            <div class="flex-row-fluid d-flex ml-md-2 flex-column">
                <div class="d-flex flex-column flex-grow-1">
                    <div class="card card-custom card-transparent">
                        <div class="card-body p-0">
                            <!--begin::Wizard-->
                            <div class="card card-custom card-shadowless rounded">
                                <div class="card-body p-0">
                                    <!--Address step 1-->
                                    <div class="my-0">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th><?php echo Yii::t('app', 'Organization Fullname');?></th>
                                                                <td class="font-weight-normal"><?=$contragent->name?></td>
                                                            </tr>
                                                            <tr>
                                                                <th><?php echo Yii::t('app', 'Organization Short Name');?></th>
                                                                <td class="font-weight-normal"><?=$contragent->short_name?></td>
                                                            </tr>
                                                            <tr>
                                                                <th><?php echo Yii::t('app', 'Address');?></th>
                                                                <td class="font-weight-normal"><?=$contragent->address?></td>
                                                            </tr>
                                                            <tr>
                                                                <th><?php echo Yii::t('app', 'Director');?></th>
                                                                <td class="font-weight-normal"><?=$contragent->director?></td>
                                                            </tr>
                                                            <tr>
                                                                <th><?php echo Yii::t('app', 'Tel');?></th>
                                                                <td class="font-weight-normal"><?=$contragent->tel?></td>
                                                            </tr>
                                                            <tr>
                                                                <th><?php echo Yii::t('app', 'Director Inn');?></th>
                                                                <td class="font-weight-normal"><?=$contragent->director_inn?></td>
                                                            </tr>
                                                            <tr>
                                                                <th><?php echo Yii::t('app', 'Accounter');?></th>
                                                                <td class="font-weight-normal"><?=$contragent->accounter?></td>
                                                            </tr>
                                                            <tr>
                                                                <th><?php echo Yii::t('app', 'Accounter Tel');?></th>
                                                                <td class="font-weight-normal"><?=$contragent->accounter_tel?></td>
                                                            </tr>
                                                            <tr>
                                                                <th><?php echo Yii::t('app', 'Accounter Inn');?></th>
                                                                <td class="font-weight-normal"><?=$contragent->accounter_inn?></td>
                                                            </tr>
                                                            <tr>
                                                                <th><?php echo Yii::t('app', 'Bank');?></th>
                                                                <td class="font-weight-normal"><?=$contragent->bank?></td>
                                                            </tr>
                                                            <tr>
                                                                <th><?php echo Yii::t('app', 'Bank Code');?></th>
                                                                <td class="font-weight-normal"><?=$contragent->bank_code?></td>
                                                            </tr>
                                                            <tr>
                                                                <th><?php echo Yii::t('app', 'Bank Account Number');?></th>
                                                                <td class="font-weight-normal"><?=$contragent->bank_account_number?></td>
                                                            </tr>
                                                            <tr>
                                                                <th><?php echo Yii::t('app', 'Fund');?></th>
                                                                <td class="font-weight-normal"><?=$contragent->fund?></td>
                                                            </tr>
                                                            <tr>
                                                                <th><?php echo Yii::t('app', 'Nc1 Name');?></th>
                                                                <td class="font-weight-normal"><?=$contragent->nc1Name?></td>
                                                            </tr>
                                                            <tr>
                                                                <th><?php echo Yii::t('app', 'Nc1 Code');?></th>
                                                                <td class="font-weight-normal"><?=$contragent->nc1Code?></td>
                                                            </tr>
                                                            <tr>
                                                                <th><?php echo Yii::t('app', 'Nc2 Name');?></th>
                                                                <td class="font-weight-normal"><?=$contragent->nc2Name?></td>
                                                            </tr>
                                                            <tr>
                                                                <th><?php echo Yii::t('app', 'Nc2 Code');?></th>
                                                                <td class="font-weight-normal"><?=$contragent->nc2Code?></td>
                                                            </tr>
                                                            <tr>
                                                                <th><?php echo Yii::t('app', 'Nc3 Name');?></th>
                                                                <td class="font-weight-normal"><?=$contragent->nc3Name?></td>
                                                            </tr>
                                                            <tr>
                                                                <th><?php echo Yii::t('app', 'Nc3 Code');?></th>
                                                                <td class="font-weight-normal"><?=$contragent->nc3Code?></td>
                                                            </tr>
                                                            <tr>
                                                                <th><?php echo Yii::t('app', 'Nc4 Name');?></th>
                                                                <td class="font-weight-normal"><?=$contragent->nc4Name?></td>
                                                            </tr>
                                                            <tr>
                                                                <th><?php echo Yii::t('app', 'Nc4 Code');?></th>
                                                                <td class="font-weight-normal"><?=$contragent->nc4Code?></td>
                                                            </tr>
                                                            <tr>
                                                                <th><?php echo Yii::t('app', 'Nc5 Name');?></th>
                                                                <td class="font-weight-normal"><?=$contragent->nc5Name?></td>
                                                            </tr>
                                                            <tr>
                                                                <th><?php echo Yii::t('app', 'Nc5 Code');?></th>
                                                                <td class="font-weight-normal"><?=$contragent->nc5Code?></td>
                                                            </tr>
                                                            <tr>
                                                                <th><?php echo Yii::t('app', 'Nc6 Name');?></th>
                                                                <td class="font-weight-normal"><?=$contragent->nc6Name?></td>
                                                            </tr>
                                                            <tr>
                                                                <th><?php echo Yii::t('app', 'Nc6 Code');?></th>
                                                                <td class="font-weight-normal"><?=$contragent->nc6Code?></td>
                                                            </tr>
                                                            <tr>
                                                                <th><?php echo Yii::t('app', 'Ns1 Name');?></th>
                                                                <td class="font-weight-normal"><?=$contragent->ns1Name?></td>
                                                            </tr>
                                                            <tr>
                                                                <th><?php echo Yii::t('app', 'Ns1 Code');?></th>
                                                                <td class="font-weight-normal"><?=$contragent->ns1Code?></td>
                                                            </tr>
                                                            <tr>
                                                                <th><?php echo Yii::t('app', 'Ns3 Name');?></th>
                                                                <td class="font-weight-normal"><?=$contragent->ns3Name?></td>
                                                            </tr>
                                                            <tr>
                                                                <th><?php echo Yii::t('app', 'Ns3 Code');?></th>
                                                                <td class="font-weight-normal"><?=$contragent->ns3Code?></td>
                                                            </tr>
                                                            <tr>
                                                                <th><?php echo Yii::t('app', 'Ns4 Name');?></th>
                                                                <td class="font-weight-normal"><?=$contragent->ns4Name?></td>
                                                            </tr>
                                                            <tr>
                                                                <th><?php echo Yii::t('app', 'Ns4 Code');?></th>
                                                                <td class="font-weight-normal"><?=$contragent->ns4Code?></td>
                                                            </tr>
                                                            <tr>
                                                                <th><?php echo Yii::t('app', 'Ns13 Name');?></th>
                                                                <td class="font-weight-normal"><?=$contragent->ns13Name?></td>
                                                            </tr>
                                                            <tr>
                                                                <th><?php echo Yii::t('app', 'Ns13 Code');?></th>
                                                                <td class="font-weight-normal"><?=$contragent->ns13Code?></td>
                                                            </tr>
                                                            <tr>
                                                                <th><?php echo Yii::t('app', 'Na1 Name');?></th>
                                                                <td class="font-weight-normal"><?=$contragent->na1Name?></td>
                                                            </tr>
                                                            <tr>
                                                                <th><?php echo Yii::t('app', 'Na1 Code');?></th>
                                                                <td class="font-weight-normal"><?=$contragent->na1Code?></td>
                                                            </tr>
                                                            <tr>
                                                                <th><?php echo Yii::t('app', 'state Name');?></th>
                                                                <td class="font-weight-normal"><?=$contragent->stateName?></td>
                                                            </tr>
                                                            <tr>
                                                                <th><?php echo Yii::t('app', 'state Code');?></th>
                                                                <td class="font-weight-normal"><?=$contragent->stateCode?></td>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::List-->
        </div>
        <!--end::Todo Docs-->
<button id="kt_demo_panel_toggle1" class="offcanvas">salom</button>



<?php
$urlToGetItems = Url::to(['department/get-items-ajax']);
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
    $('#kt_demo_panel_toggle').click(); 
    $('.right-modal-all').load(url); 
  
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

// delete license department
$('body').delegate('.delete-license-department', 'click', function(e) {
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
    let href_create = '/manuals/license/create-department?dep=' + id;
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
                $('tbody').html('');
                if(response){
                    let address = response['address'];
                    let bank = response['bank'];
                    let vat = response['vat'];
                    let license = response['license'];
                     address.map(function(item) {
                         var status_cheack;
                        if (item['status'] == 1) {
                            status_cheack = 'success';
                            item['status'] = 'Active';
                        } else {
                            status_cheack = 'warning';
                            item['status'] = 'Inactive';
                        }
                        let td_address = '<tr>' +
                             '<td>'+ item['physical_location'] +'</td>' +
                             '<td>'+ item['legal_location'] +'</td>' +
                             '<td><p class="btn btn-xs btn-'+ status_cheack +' status-address">'+ item['status'] +'</p></td>' +
                             '<td>'+ item['tel'] +'</td>' +
                             '<td>'+ item['email'] +'</td>' +
                             '<td>';
                        if (item['status'] == 'Active') {
                            td_address += '<button href="/structure/department/update-address?id='+ item['id'] +'" class="btn btn-icon btn-xs mr-1 btn-outline-primary update-address"><i class="la la-pencil-square-o"></i></button>';

                        }    
                        td_address += '<button href="/structure/department/view-address?id='+ item['id'] +'" class="btn btn-icon btn-xs btn-outline-info view-address" data-toggle="modal" data-target="#exampleModalCustomScrollable"><i class="la la-eye"></i></button>' +
                             '</td>' +
                          '</tr>'; 
                         $('#kt_datatable4').find('tbody').append(td_address);
                     });
                     $('#kt_datatable4').find('thead').html('<tr>' +
                      '<th title="Field #2">{$p_location}</th>' +
                      '<th title="Field #3">{$l_location}</th>' +
                      '<th title="Field #4">{$status}</th>' +
                      '<th title="Field #5">{$tel}</th>' +
                      '<th title="Field #6">{$email}</th>' +
                      '<th title="Field #7">{$act}</th>' +
                    '</tr>');
                     bank.map(function(item) {
                        var status_cheack;
                        if (item['status'] == 1) {
                            status_cheack = 'success';
                            item['status'] = 'Active';
                        } else {
                            status_cheack = 'warning';
                            item['status'] = 'Inactive';
                        }
                         $('#kt_datatable1').find('tbody').append(
                          '<tr>' +
                             '<td>'+ item['account_type'] +'</td>' +
                             '<td>'+ item['bank_account'] +'</td>' +
                             '<td>'+ item['bank'] +'</td>' +
                             '<td>'+ item['mfo'] +'</td>' +
                             '<td>'+ item['inn'] +'</td>' +
                             '<td>'+ item['address'] +'</td>' +
                             '<td><p class="btn btn-xs btn-'+ status_cheack +'">'+ item['status'] +'</p></td>' +
                             '<td>' +
                                 '<button href="/structure/department/update-bank-account?id='+ item['id'] +'" class="btn btn-icon mr-1 btn-xs btn-outline-primary update-bank-account"><i class="la la-pencil-square-o"></i></button>' +
                             '</td>' +
                          '</tr>'); 
                     });
                     $('#kt_datatable1').find('thead').html('<tr>' +
                      '<th title="Field #1">{$b_account_type}</th>' +
                      '<th title="Field #2">{$b_bank_account}</th>' +
                      '<th title="Field #3">{$b_banks}</th>' +
                      '<th title="Field #4">{$b_mfo}</th>' +
                      '<th title="Field #5">{$b_inn}</th>' +
                      '<th title="Field #6">{$b_address}</th>' +
                      '<th title="Field #7">{$b_status}</th>' +
                      '<th title="Field #8">{$act}</th>' +
                    '</tr>');
                    vat.map(function(item) {
                        var status_cheack;
                        if (item['status'] == 1) {
                            status_cheack = 'success';
                            item['status'] = 'Active';
                        } else {
                            status_cheack = 'warning';
                            item['status'] = 'Inactive';
                        }
                        let vat_td = '<tr>' +
                             '<td>'+ item['vat'] +'</td>' +
                             '<td>'+ item['created'] +'</td>' +
                             '<td>'+ item['updated'] +'</td>' +
                             '<td><p class="btn btn-xs btn-'+ status_cheack +'">'+ item['status'] +'</p></td>';
                        if (item['status'] == 'Active') {
                            vat_td += '<td>' +
                                 '<button href="/structure/department/update-vat?id='+ item['id'] +'" class="btn mr-1 btn-icon btn-xs btn-outline-primary update-bank-account"><i class="la la-pencil-square-o"></i></button>' +
                             '</td>';
                        }
                        vat_td += '</tr>';
                        $('#kt_datatable2').find('tbody').append(vat_td); 
                     });
                     $('#kt_datatable2').find('thead').html('<tr>' +
                      '<th title="Field #1">{$v_vat}</th>' +
                      '<th title="Field #2">{$v_started}</th>' +
                      '<th title="Field #3">{$v_finished}</th>' +
                      '<th title="Field #4">Status</th>' +
                      '<th title="Field #5">{$act}</th>' +
                    '</tr>');
                     license.map(function(item) {
                        let vat_td = '<tr>' +
                             '<td>'+ item['responsible'] +'</td>' +
                             '<td>'+ item['serial'] +'</td>' +
                             '<td>'+ item['order_number'] +'</td>' +
                             '<td>' +
                                 '<a href="/manuals/license/update-department?dep=1&id='+ item['id'] +'" class="mr-1 btn btn-icon btn-xs btn-outline-primary"><i class="la la-pencil-square-o"></i></a>' +
                                  '<a class="btn btn-icon btn-xs btn-outline-danger" href="/structure/references/update-department?dep=1&id='+ item['id'] +'" data-method="post"><i class="la la-trash-restore-alt"></i></a>' +
                             '</td>' +
                           '</tr>';
                        $('#kt_datatable3').find('tbody').append(vat_td); 
                     });
                     $('#kt_datatable3').find('thead').html('<tr>' +
                      '<th title="Field #1">{$l_res}</th>' +
                      '<th title="Field #2">{$l_serial}</th>' +
                      '<th title="Field #3">{$l_order}</th>' +
                      '<th title="Field #5">{$act}</th>' +
                    '</tr>');
                    
                    address_bool = 0;
                    bank_account_bool = 0;
                    vat_bool = 0;
                    license_bool = 0;
                     $('.wizard-step').map(function(index, item) {
                        if ($(item).attr('data-wizard-state') == "current") {
                            if ($(this).attr('data-selected') == 'address') {
                                KTDatatableHtmlTableDemo4.init();
                                address_bool = 1;
                            } else if ($(this).attr('data-selected') == 'bank_account') {
                                KTDatatableHtmlTableDemo1.init();
                                bank_account_bool = 1;
                            } else if ($(this).attr('data-selected') == 'vat') {
                                KTDatatableHtmlTableDemo2.init();
                                vat_bool = 1;
                            } else if ($(this).attr('data-selected') == 'license') {
                                KTDatatableHtmlTableDemo3.init();
                                license_bool = 1;
                            }        
                        }
                     });
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
