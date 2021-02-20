<?php
use app\modules\manuals\models\Bank;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\ActiveForm;
$lang = Yii::$app->language;
/* @var $this yii\web\View */
/* @var $model app\modules\project\models\Project */
/* @var $form yii\widgets\ActiveForm */
?>

    <div class="card-body">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <div class="row">
            <div class="col-md-2">
                <?= $form->field($model, 'deadline_date')->textInput(['id' => 'kt_datepicker_3']); ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'project_capacity')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-2">
                <?= $form->field($model, 'total_cost')->textInput() ?>
            </div>
            <div class="col-md-1">
                <?= $form->field($model, 'total_cost_currency_id')->dropDownList($model->cp['currencyList']) ?>
            </div>
            <div class="col-md-2">
                <?= $form->field($model, 'reamin_on_year_begin')->textInput() ?>
            </div>
            <div class="col-md-1">
                <?= $form->field($model, 'remain_on_year_begin_currency_id')->dropDownList($model->cp['currencyList']) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <?= $form->field($model, 'production_time')->textInput(['id' => 'kt_datepicker_3']) ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'delivery_time')->textInput(['id' => 'kt_datepicker_3']) ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'installation_time')->textInput(['id' => 'kt_datepicker_3']) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'add_info')->textarea(['maxlength' => true, 'rows' => 3]) ?>

                <?= $form->field($model, 'lending_bank_id')->widget(Select2::class, [
                    'data' => ArrayHelper::map(Bank::find()->where(['status' => Bank::STATUS_ACTIVE])->asArray()->all(), 'id', "name_{$this->context->lang}")
                ]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, "project_attachment")->hiddenInput(['class' => "file-hidden-input", 'value' => implode(",", $model->cp['project_attachment'] ?? [])])->label(false)?>
                <div class="dropzone dropzone-multi" id="kt_dropzone_5">
                    <div class="dropzone-panel mb-lg-0 mb-2">
                        <a class="dropzone-select btn btn-light-primary font-weight-bold btn-sm"><?= Yii::t('app', "Attach files")?></a>
                    </div>
                    <div class="dropzone-items row">
                        <div class="dropzone-item col-md-6 col-xs-12 border-wh" data-remove="1" style="">
                            <div class="dropzone-file">
                                <div class="dropzone-filename" title="some_image_file_name.jpg">
                                    <div data-dz-image=""><img data-dz-thumbnail src="" alt="" class="dropzone-img"></div>
                                    <span data-dz-name="">some_image_file_name.jpg</span>
                                    <strong>(
                                        <span data-dz-size="">340kb</span>)</strong>
                                </div>
                                <div class="dropzone-error" data-dz-errormessage=""></div>
                            </div>
                            <div class="dropzone-progress">
                                <div class="progress">
                                    <div class="progress-bar bg-primary" role="progressbar" aria-valuemin="0"
                                         aria-valuemax="100" aria-valuenow="0" data-dz-uploadprogress=""></div>
                                </div>
                            </div>
                            <div class="dropzone-toolbar">
                            <span class="dropzone-delete" data-dz-remove="">
                                <i class="flaticon2-cross"></i>
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
<?php
$imageUrl = Url::to("/project/project/upload-attachment");
$this->registerJsVar("defaultValues", $model->project_attachment);
$this->registerJsVar("ajaxImageUpload", $imageUrl);
$this->registerJsVar("csrfParam", Yii::$app->request->csrfParam);
$this->registerJsVar("csrfToken", Yii::$app->request->csrfToken);
$js = <<< JS
let KTDropzoneDemo = function () {
    var demo3 = function () {
         var id = '#kt_dropzone_5';

         var previewNode = $(id + " .dropzone-item");
         previewNode.id = "";
         var previewTemplate = previewNode.parent('.dropzone-items').html();
         if (previewNode.attr("data-remove") === "1") {
             previewNode.remove();
         }
         var myDropzone5 = new Dropzone(id, { // Make the whole body a dropzone
             url: ajaxImageUpload, // Set the url for your upload script location
             init: function() {
               this.on("sending", function(file, xhr, formData){
                 formData.append(csrfParam, csrfToken);
               });
                thisDropzone = this;
                if (defaultValues == null) {
                    return;
                }
                $.each(defaultValues, function (key, value) {
                    let mockFile = { name: value.attachment.name, size: value.attachment.size };
                    thisDropzone.emit("addedfile", mockFile);
                    if (['png','jpg','jpeg','gif','bmp'].indexOf(value.attachment.extension) !== -1) {
                      thisDropzone.options.thumbnail.call(thisDropzone, mockFile, "/"+value.attachment.path);
                    } else if (['doc','docx'].indexOf(value.attachment.extension) !== -1) {
                      thisDropzone.options.thumbnail.call(thisDropzone, mockFile, "/icon/doc.png");
                    } else if (['mp4','avi','mkv','3gp'].indexOf(ext) !== -1) {
                        $(file.previewElement).find(".dropzone-filename img").attr("src", "/icon/mp4.png");
                    } else if (['xls','xlsx'].indexOf(value.attachment.extension) !== -1) {
                      thisDropzone.options.thumbnail.call(thisDropzone, mockFile, "/icon/xls.png");
                    } else if (['txt'].indexOf(value.attachment.extension) !== -1) {
                      thisDropzone.options.thumbnail.call(thisDropzone, mockFile, "/icon/txt.png");
                    } else if (['pdf'].indexOf(value.attachment.extension) !== -1) {
                      thisDropzone.options.thumbnail.call(thisDropzone, mockFile, "/icon/pdf.png");
                    } else if (['zip'].indexOf(value.attachment.extension) !== -1) {
                      thisDropzone.options.thumbnail.call(thisDropzone, mockFile, "/icon/zip.png");
                    } else {
                      thisDropzone.options.thumbnail.call(thisDropzone, mockFile, "/icon/document.png");
                    }
                    thisDropzone.emit("complete", mockFile);
                });
             },
             parallelUploads: 1,
             maxFilesize: 2, // Max filesize in MB
             createImageThumbnails: true,
             maxThumbnailFilesize: 1,
             thumbnailWidth: 120,
             thumbnailHeight: 120,
             previewTemplate: previewTemplate,
             previewsContainer: id + " .dropzone-items", // Define the container to display the previews
             clickable: id + " .dropzone-select", // Define the element that should be used as click trigger to select files.
             success: function(result) {
               let input = $(".file-hidden-input");
               let response = JSON.parse(result.xhr.response);
               let val = (input.val()).split(",");
               console.log(val)
               val.push(response.file.id);
               console.log(val)
               input.val(val.join(","));
             }
         });

         myDropzone5.on("addedfile", function(file) {
             $(document).find( id + ' .dropzone-item').css('display', '');
             let ext = file.name.split('.').pop();
             console.log(file)
             
             if (['png','jpg','jpeg','gif','bmp'].indexOf(ext) !== -1) {
                 // rasm o'zi chiqadi
             } else if (['doc','docx'].indexOf(ext) !== -1) {
                 $(file.previewElement).find(".dropzone-filename img").attr("src", "/icon/doc.png");
             } else if (['xls','xlsx'].indexOf(ext) !== -1) {
                 $(file.previewElement).find(".dropzone-filename img").attr("src", "/icon/doc.png");
             } else if (['mp4','avi','mkv','3gp'].indexOf(ext) !== -1) {
                 $(file.previewElement).find(".dropzone-filename img").attr("src", "/icon/mp4.png");
             } else if (['txt'].indexOf(ext) !== -1) {
                 $(file.previewElement).find(".dropzone-filename img").attr("src", "/icon/txt.png");
             } else if (['pdf'].indexOf(ext) !== -1) {
                 $(file.previewElement).find(".dropzone-filename img").attr("src", "/icon/pdf.png");
             } else if (['zip'].indexOf(ext) !== -1) {
                 $(file.previewElement).find(".dropzone-filename img").attr("src", "/icon/zip.png");
             } else {
                 $(file.previewElement).find(".dropzone-filename img").attr("src", "/icon/document.png");
             }
         });

         myDropzone5.on("totaluploadprogress", function(progress) {
             $( id + " .progress-bar").css('width', progress + "%");
         });

         myDropzone5.on("sending", function(file) {
             $( id + " .progress-bar").css('opacity', "1");
         });

         myDropzone5.on("complete", function(progress) {
             var thisProgressBar = id + " .dz-complete";
             
             console.log(progress)
             setTimeout(function(){
                 $( thisProgressBar + " .progress-bar, " + thisProgressBar + " .progress").css('opacity', '0');
             }, 300)
         });
    }
    return {
        init: function() {
            demo3();
        }
    };
}();
KTUtil.ready(function() {
    KTDropzoneDemo.init();
});
JS;
$this->registerJs($js, View::POS_READY);

$this->registerCss(<<<CSS
.dropzone-img {
    max-height: 50px;
}
.border-wh {
    border: 5px solid white;
}
CSS
);