<?php

use yii\helpers\Url;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\modules\manuals\models\License */
/* @var $form yii\widgets\ActiveForm */
?>

    <div class="license-form">

        <?php $form = ActiveForm::begin([
            'class' => 'form'
        ]); ?>

        <div class="card card-custom gutter-b example example-compact">
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-sm-6">
                        <?= $form->field($model, 'serial_number')->input('number',[])
                            ->label(Yii::t('app', 'Serial number') . $model::getRequirementForLabel('Введите серийный номер'))?>
                    </div>
                    <div class="col-sm-6">
                        <?= $form->field($model, 'serial')->textInput([])
                            ->label(Yii::t('app', 'Serial') . $model::getRequirementForLabel('Пишите порядковый номер'))?>

                    </div>

                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <?= $form->field($model, 'order_date')->textInput(['id'=>'kt_datepicker_3'])
                            ->label(Yii::t('app', 'Order date') . $model::getRequirementForLabel('Пишите дата заказа'))?>

                    </div>
                    <div class="col-sm-6">
                        <?= $form->field($model, 'order_number')->input('number',[])
                            ->label(Yii::t('app', 'Order number') . $model::getRequirementForLabel('Пишите номер заказа'))?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <?= $form->field($model, 'given_date')->textInput(['id' => 'kt_datepicker_3'])
                            ->label(Yii::t('app', 'Given date') . $model::getRequirementForLabel('Пишите дата получения'));?>
                    </div>

                    <div class="col-sm-6">
                        <?= $form->field($model, 'responsible')->textInput(['maxlength' => true])
                            ->label(Yii::t('app', 'Responsible') . $model::getRequirementForLabel('Запишите ответственного лица'))?>
                    </div>

                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <?= $form->field($model, 'expiration_date')->textInput(['id' => 'kt_datepicker_3'])
                            ->label(Yii::t('app', 'Expiration date') . $model::getRequirementForLabel('Срок действия лицензии'))?>
                    </div>
                    <div class="col-sm-6">
                        <?= $form->field($model, 'item_category_id')->widget(Select2::classname(), [
                            'data' => $model->getItemCategoryLists(),
                            'options' => ['placeholder' => Yii::t('app','Select a item category')],
                            'pluginOptions' => [
                                'class'=>'form-control form-control-solid',
                                'allowClear' => true,
                                'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                            ],
                        ])->label(Yii::t('app', 'Item category') . $model::getRequirementForLabel('Выберите категорию товара'))?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 hidden-department">
                        <?= $form->field($model, 'department_id')->widget(Select2::classname(), [
                            'data' => $model->getItemDepartmentLists(),
                            'options' => ['placeholder' => '', 'class' => 'hidden-department-id'],
                            'pluginOptions' => [
                                'class'=>'form-control form-control-solid',
                                'allowClear' => true,
                                'escapeMarkup' => new \yii\web\JsExpression('function (markup) { return markup; }'),
                            ],
                        ])->label(Yii::t('app', 'Department') . $model::getRequirementForLabel('Выберите Подразделение')) ?>
                    </div>
                    <div class="col-sm-6">
                        <?= $form->field($model, 'status')->dropDownList([
                            $model::STATUS_ACTIVE => Yii::t('app', 'Active'),
                            $model::STATUS_INACTIVE => Yii::t('app', 'Inactive'),
                        ]) ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-sm btn-outline-primary font-weight-bolder create-license">
                            <?php echo '<i class="la la-save"></i>'. Yii::t('app', 'Save') ?>
                        </button>
                    </div>
                </div>
            </div>
        </div>


        <?php ActiveForm::end(); ?>

    </div>
<?php

?>
<?php
$id = !empty(Yii::$app->request->get('id'))?Yii::$app->request->get('id'):-1;
$url = Url::to(['/structure/department']);
$dep = empty(Yii::$app->request->get('dep'))? 0 : Yii::$app->request->get('dep');
$js = <<<JS
let id_department = {$dep};
if (id_department != '0' ){
    $('.hidden-department').addClass('offcanvas');
    $('.hidden-department-id').val(id_department);
    $('.back-department').attr('href', '{$url}');
    $('.create-license').attr('href', '');
}

$('body').delegate('.jstree-anchor', 'click', function() {
    $('.jstree-icon').css({'color':'#0c5460'});
    $('.jstree-anchor').css({'background-color':'white','color':'black'});
    $(this).css({'background-color':'#0c5460','color':'white'});
    $(this).find('.jstree-icon').css({'color':'white'});
});
$('body').delegate('#kt_tree_1', 'click', function(e) {
    var value = $('#kt_tree_1 li');
    var id;
    value.each(function(index, item) {
        if ($(item).attr('aria-selected') == 'true') {
            id = $(item).val();
        }
    });
    $('.hidden-department-id').val(id);
});
JS;
$this->registerJS($js);
?>
