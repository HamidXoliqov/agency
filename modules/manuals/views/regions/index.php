<?php

use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\manuals\models\RegionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $regions_tree  */

$this->title = Yii::t('app', 'Regions');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card card-custom">
    <div class="card-body">
        <div class="card-body px-5" style="border-radius: 8px; border: 1px solid lightgrey; text-align: left">
            <button disabled class="btn btn-sm-button btn-outline-info add-tree save-parent" id="kt_quick_cart_toggle" href="<?=Url::to(['regions/create'])?>">
                <i class="la la-plus ml-1"></i>
            </button>
            <button class="btn btn-sm-button btn-outline-success add-tree click_view" date-create="true" href="<?=Url::to(['regions/create'])?>">
                <i class="la la-tree ml-1"></i>
            </button>
            <button disabled class="btn btn-sm-button btn-outline-danger delete-tree delete-parent"   href="<?=Url::to(['regions/delete-ajax'])?>">
                <i class="la la-trash ml-1"></i>
            </button>
            <button disabled class="btn btn-sm-button btn-outline-primary update-parent" href="<?=Url::to(['regions/update']) ?>">
                <i class="la la-pen ml-1"></i>
            </button>
            <br><br>
            <div id="kt_tree_1" class="tree-demo">
                <?=$regions_tree?>
            </div>

        </div>
    </div>

</div>

<div id="kt_quick_panel_toggle" class="offcanvas"></div>
<?php
$massage = Yii::t('app','Delete Yes');
$massage1 = Yii::t('app','Delete Not ');
$js = <<< JS
  let value = $('#kt_tree_1 li');
  let id = '';
  let f = '';
   value.each(function(index, item) {
       if ($(item).attr('data-status') == '0') {
            id = $(item).val()*1;
            f = $(item).attr('data-parent-id')*1;
        }
   });
   
    $('body').delegate('.jstree-anchor', 'click', function() {
        $('.save-parent').attr('disabled', false);
        $('.delete-parent').attr('disabled', false);
        $('.update-parent').attr('disabled', false);
        $('#reset-parent').attr('disabled', false);
        $('.jstree-icon').css({'color':'#0c5460'});
        $('.jstree-anchor').css({'background-color':'white','color':'black'});
        $(this).css({'background-color':'#0c5460','color':'white'});
        $(this).find('.jstree-icon').css({'color':'white'});
    });
    $('body').delegate('#kt_quick_cart_toggle', 'click', function(e) {
        e.preventDefault();
            let url = $(this).attr('href');
            $('.create-modal').load(url);
            $('.save-parent').attr('disabled', true);
    });
    $('body').delegate('.click_view', 'click', function(e) {
        e.preventDefault();
            let url = $(this).attr('href');
            var value = $('#kt_tree_1 li');
            value.each(function(index, item) {
                if ($(item).attr('aria-selected') == 'true') {
                    $(item).attr('aria-selected', 'false');
                }
            });
            $('#kt_quick_panel_toggle').click();
            $('.update-modal').load(url);
    });
$('body').delegate('#kt_demo_panel_toggle', 'click', function(e) {
    let url=$(this).attr('href');
    $('.kt_demo_panel_show').load(url); 
});
$('.card').click(function(e) {
  if(e.target.tagName!='I'&&e.target.tagName!='A'){
        $('.save-parent').attr('disabled', true);
        $('.delete-parent').attr('disabled', true);
        $('.update-parent').attr('disabled', true);
        let value = $('#kt_tree_1 li[aria-selected=true]');
        value.attr("aria-selected","false");
        value.find('.jstree-icon').css({'color':'rgb(12, 84, 96)'});
        value.find('.jstree-anchor').css({'background-color':'white','color':'black'});
        value.find('a').css({'color':'black'});
        // console.log($(e.target).parents())
  }
});
// update
$('body').delegate('.update-parent', 'click', function() {
    let url=$(this).attr('href');
    var value = $('#kt_tree_1 li');
    var id;
    value.each(function(index, item) {
        if ($(item).attr('aria-selected') == 'true') {
            id = $(item).val();
        }
    });
    url = url+'?id='+id;
    $('.update-modal').load(url);
    $('#kt_quick_panel_toggle').click();
   
});
$('body').delegate('#kt_demo_panel_toggle_root', 'click', function(e) {
    e.preventDefault();
    var value = $('#kt_tree_1 li');
    value.each(function(index, item) {
        if ($(item).attr('aria-selected') == 'true') {
            $(item).val('false');
        }
    });
    $('#kt_demo_panel_toggle').click(); 
});
$('body').delegate('.delete-tree', 'click', function(e) {
    e.preventDefault();
    let url=$('.delete-parent').attr('href');
    var value = $('#kt_tree_1 li');
    console.log(url);
    var id;
    value.each(function(index, item) {
        if ($(item).attr('aria-selected') == 'true') {
            id = $(item).val()*1;
            f = $(item).attr('data-parent-id')*1;
        }
    });
 
    let bool = confirm("{$massage}");
    if( bool){
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
                } else{
                    alert("{$massage1}");
                }      
            }
        });
    }else {
        $('.save-parent').attr('disabled', true);
        $('.delete-parent').attr('disabled', true);
        $('.update-parent').attr('disabled', true);
        let value = $('#kt_tree_1 li[aria-selected=true]');
        value.attr("aria-selected","false");
        value.find('.jstree-icon').css({'color':'rgb(12, 84, 96)'});
        value.find('.jstree-anchor').css({'background-color':'white','color':'black'});
        value.find('a').css({'color':'black'});

    }
    $('.delete-parent').attr('disabled', true);
    $('.save-parent').attr('disabled', true);
    $('.update-parent').attr('disabled', true);
});
JS;
$this->registerJs($js)
?>
