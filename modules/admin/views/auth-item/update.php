<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\AuthItem */
/* @var $view */

$this->title = Yii::t('app', 'Update Auth Item: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Auth Items'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');

?>
<span class="btn btn-sm btn-outline-info mb-4 select-all-child"><?php echo '<i class="la la-check"></i>'.Yii::t('app', 'Select All'); ?></span>
<?php \yii\bootstrap\ActiveForm::begin(); ?>
    <input type="hidden" name="role_name" value="<?= Yii::$app->request->get('id'); ?>">

    <div class="row">
        <?= $view; ?>
    </div>

    <?= Html::submitButton('<i class="la la-save"></i>'.Yii::t('app', 'Save All'), ['class' => 'btn btn-sm btn-outline-primary']); ?>

<?php \yii\bootstrap\ActiveForm::end(); ?>
<?php
$js = <<<JS
    $('body').delegate('.checked-true-false', 'mousedown', function() {
        let input = $(this).parents('.form-group').find('input');
       input.map(function(index, item) {
           $(item).attr('checked', 'checked');
       });
       $(this).addClass('checked-false-true');
       $(this).removeClass('checked-true-false');
    });

    $('body').delegate('.checked-false-true', 'mousedown', function() {
       let input = $(this).parents('.form-group').find('input');
       input.map(function(index, item) {
           $(item).removeAttr('checked');
       });
       $(this).addClass('checked-true-false');
       $(this).removeClass('checked-false-true');
    });

    $('body').delegate('.select-all-child', 'mousedown', function() {
        let input_all = $('body').find('input');
        input_all.map(function(index, item) {
            $(item).attr('checked', 'checked');
        });
        $(this).addClass('checked-true-all');
        $(this).removeClass('select-all-child');
    });
    
    $('body').delegate('.checked-true-all', 'mousedown', function() {
        let input_all = $('body').find('input');
        input_all.map(function(index, item) {
            $(item).removeAttr('checked');
        });
        $(this).addClass('select-all-child');
        $(this).removeClass('checked-true-all');
    });
JS;
$this->registerJs($js);
?>

